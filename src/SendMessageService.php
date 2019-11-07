<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 13:46.
 */

declare(strict_types=1);

namespace TelegramBundle;

use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use TelegramBundle\Events\AbstractEvent;
use TelegramBundle\Events\CallbackQueryEvent;
use TelegramBundle\Events\CommandEvent;
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Entities\Update;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SendMessage.
 */
class SendMessageService implements Interfaces\SendMessageInterface
{
    /**
     * @var ClientInterface
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
     * SendMessage constructor.
     *
     * @param ContainerInterface       $container
     * @param ClientInterface          $client
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(ContainerInterface $container, ClientInterface $client, EventDispatcherInterface $dispatcher)
    {
        $this->client = $client;
        $this->dispatcher = $dispatcher;

        $this->apiUrl = rtrim($container->getParameter('telegram.api.url'), '/') . '/bot'
            . $container->getParameter('telegram.api.token') . '/';
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param string|null $method
     *
     * @return UriInterface
     */
    public function getApiUrl(string $method): UriInterface
    {
        return new Uri($this->apiUrl . $method);
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
            $requestContent = json_decode($request->getContent(), false, 512, JSON_THROW_ON_ERROR);
        }
        /* @noinspection PhpUndefinedClassInspection */
        catch (\JsonException $e) {
            throw new TelegramException('Unable to decode request content: ' . $e->getMessage());
        }

        $update = new Update($requestContent);
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
        if ($update->getMessage() !== null) {
            $event = new CommandEvent($request, $update, $this);
            $name = CommandEvent::NAME;
        }

        if ($update->getCallbackQuery() !== null) {
            $event = new CallbackQueryEvent($request, $update, $this);
            $name = CallbackQueryEvent::NAME;
        }

        if ($event instanceof AbstractEvent && !$event->isPropagationStopped()) {
            $this->dispatcher->dispatch($event, $name);
            $event->stopPropagation();
        }
    }
}
