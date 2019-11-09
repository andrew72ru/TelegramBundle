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
use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\{
    Exception\ClientExceptionInterface,
    Exception\RedirectionExceptionInterface,
    Exception\ServerExceptionInterface,
    Exception\TransportExceptionInterface,
    HttpClientInterface,
    ResponseInterface
};
use TelegramBundle\Entities\Update;
use TelegramBundle\Events\{AbstractEvent, CallbackQueryEvent, CommandEvent};
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Interfaces\MethodInterface;

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
     *
     * @param ContainerInterface       $container
     * @param EventDispatcherInterface $dispatcher
     * @param SerializerInterface      $serializer
     */
    public function __construct(ContainerInterface $container, EventDispatcherInterface $dispatcher, SerializerInterface $serializer)
    {
        $this->dispatcher = $dispatcher;
        $this->apiUrl = sprintf('/bot%s', $container->getParameter('telegram.api.token'));

        $this->client = HttpClient::create([
            'http_version' => '2.0',
            'base_uri' => rtrim($container->getParameter('telegram.api.url'), '/'),
            'resolve' => ['api.telegram.org' => '443:149.154.167.220'],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
        $this->serializer = new Serializer([
            new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter(), null, new ReflectionExtractor()),
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
        ], [
            new JsonEncoder(),
        ]);
    }

    /**
     * @return HttpClientInterface
     */
    public function getClient(): HttpClientInterface
    {
        return $this->client;
    }

    /**
     * @return string Base API url
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param MethodInterface $method
     * @param array           $options
     *
     * @return ResponseInterface
     *
     * @throws TransportExceptionInterface
     */
    public function getResponse(MethodInterface $method, array $options = []): ResponseInterface
    {
        $url = \sprintf('%s/%s', $this->apiUrl, $method->getMethodName());

        return $this->client->request(Request::METHOD_POST, $url, $options);
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
            /** @var Update $update */
            $update = $this->serializer->deserialize((string) $request->getContent(), Update::class, 'json');
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
        }

        if (null !== $update->getCallbackQuery()) {
            $event = new CallbackQueryEvent($request, $update, $this);
        }

        if ($event instanceof AbstractEvent && !$event->isPropagationStopped()) {
            $this->dispatcher->dispatch($event);
            $event->stopPropagation();
        }
    }
}
