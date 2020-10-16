<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 13:46.
 */

declare(strict_types=1);

namespace TelegramBundle;

use Doctrine\Common\{Annotations\AnnotationException, Annotations\AnnotationReader, Annotations\DocParser};
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\{
    Encoder\JsonEncoder,
    Mapping\Factory\ClassMetadataFactory,
    Mapping\Loader\AnnotationLoader,
    NameConverter\CamelCaseToSnakeCaseNameConverter,
    Normalizer\ArrayDenormalizer,
    Normalizer\ObjectNormalizer,
    Serializer,
    SerializerInterface
};
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\{
    Exception\TransportExceptionInterface,
    HttpClientInterface,
    ResponseInterface
};
use TelegramBundle\Entities\Update;
use TelegramBundle\Events\{AbstractEvent, CallbackQueryEvent, CommandEvent};
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Interfaces\MethodInterface;
use TelegramBundle\Serializer\DateTimeNormalizer;

/**
 * Class SendMessage.
 */
class SendMessageService implements Interfaces\SendMessageInterface
{
    private HttpClientInterface $client;
    private string $apiUrl;
    private EventDispatcherInterface $dispatcher;
    private SerializerInterface $serializer;
    private DateTimeNormalizer $dateTimeNormalizer;

    /**
     * SendMessage constructor.
     *
     * @param ParameterBagInterface    $container
     * @param DateTimeNormalizer       $dateTimeNormalizer
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(ParameterBagInterface $container, DateTimeNormalizer $dateTimeNormalizer, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->dateTimeNormalizer = $dateTimeNormalizer;
        $this->apiUrl = sprintf('/bot%s', $container->get('telegram.api.token'));

        $this->client = $this->createClient($container);
        $this->serializer = $this->createSerializer();
    }

    protected function createSerializer(): SerializerInterface
    {
        try {
            $reader = new AnnotationReader(new DocParser());
        } catch (AnnotationException $e) {
            throw new \RuntimeException($e->getMessage(), (int) $e->getCode(), $e);
        }
        $metadataFactory = new ClassMetadataFactory(new AnnotationLoader($reader));
        $objectNormalizer = new ObjectNormalizer($metadataFactory, new CamelCaseToSnakeCaseNameConverter(), PropertyAccess::createPropertyAccessor(), new ReflectionExtractor());

        return new Serializer([$objectNormalizer, $this->dateTimeNormalizer, new ArrayDenormalizer()], [new JsonEncoder()]);
    }

    protected function createClient(ParameterBagInterface $parameterBag): HttpClientInterface
    {
        $parameters = [
            'http_version' => '2.0',
            'base_uri' => \rtrim($parameterBag->get('telegram.api.url'), '/'),
            'headers' => ['Content-Type' => 'application/json'],
        ];

        if ($parameterBag->has('telegram_resolve') && \is_array($parameterBag->get('telegram_resolve'))) {
            $parameters['resolve'] = $parameterBag->get('telegram_resolve');
        }

        return HttpClient::create($parameters);
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
            $update = $this->serializer->deserialize((string) $request->getContent(), Update::class, 'json');
        } catch (\Throwable $e) {
            throw new TelegramException(\sprintf('Unable to deserialize content: %s', $e->getMessage()));
        }
        if (!$update instanceof Update) {
            throw new TelegramException(\sprintf('Deserialized data must be an %s class, % given', Update::class, (\is_object($update) ? \get_class($update) : \gettype($update))));
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
