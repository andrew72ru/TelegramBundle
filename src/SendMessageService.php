<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 13:46.
 */

declare(strict_types=1);

namespace TelegramBundle;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use TelegramBundle\Entities\Update;
use TelegramBundle\Events\AbstractEvent;
use TelegramBundle\Events\CallbackQueryEvent;
use TelegramBundle\Events\CommandEvent;
use TelegramBundle\Exceptions\TelegramException;

/**
 * Class SendMessage.
 */
class SendMessageService implements Interfaces\SendMessageInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * SendMessage constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $dispatcher
     * @param SerializerInterface $serializer
     */
    public function __construct(ContainerInterface $container, EventDispatcherInterface $dispatcher, SerializerInterface $serializer)
    {
        $this->dispatcher = $dispatcher;

        $this->apiUrl = sprintf('%s/bot%s/', rtrim($container->getParameter('telegram.api.url'), '/'), $container->getParameter('telegram.api.token'));

        $this->client = HttpClient::create([
            'http_version' => '2.0',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
        $this->serializer = $serializer;
    }

    /**
     * @return HttpClientInterface
     */
    public function getClient(): HttpClientInterface
    {
        return $this->client;
    }

    /**
     * @param string|null $method
     * @return string
     */
    public function getApiUrl(string $method): string
    {
        return sprintf('%s/%s', $this->apiUrl, ltrim($method, '/'));
    }

    /**
     * @param Request $request
     *
     * @return Update
     *
     * @throws TelegramException
     */
    public function processRequest(Request $request): Update
    {
        try {
            $requestContent = \json_decode($request->getContent(), false, 512, JSON_THROW_ON_ERROR);
        }
        catch (\JsonException $e) {
            throw new TelegramException(\sprintf('Unable to decode request content: %s', $e->getMessage()));
        }

        try {
            /** @var Update $update */
            $update = $this->serializer->deserialize($requestContent, Update::class, 'json');
        } catch (\Throwable $e) {
            throw new TelegramException(\sprintf('Unable to deserialize content: %s', $e->getMessage()));
        }
        $this->callEvent($request, $update);

        return $update;
    }

    /**
     * @param Request $request
     * @param Update  $update
     */
    protected function callEvent(Request $request, Update $update): void
    {
        $event = null;
        $name = null;
        if (null !== $update->getMessage()) {
            $event = new CommandEvent($request, $update, $this);
            $name = CommandEvent::NAME;
        }

        if (null !== $update->getCallbackQuery()) {
            $event = new CallbackQueryEvent($request, $update, $this);
            $name = CallbackQueryEvent::NAME;
        }

        if ($event instanceof AbstractEvent && !$event->isPropagationStopped()) {
            $this->dispatcher->dispatch($event, $name);
            $event->stopPropagation();
        }
    }
}
