<?php declare(strict_types=1);


namespace App\Tests\Service;


use ReflectionObject;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use TelegramBundle\Entities\Chat;
use TelegramBundle\Entities\Message;
use TelegramBundle\Entities\MessageEntity;
use TelegramBundle\Entities\TelegramUser;
use TelegramBundle\Entities\Update;
use TelegramBundle\Interfaces\SendMessageInterface;
use TelegramBundle\SendMessageService;

class UpdateSerializationTest extends KernelTestCase
{
    private SendMessageInterface $service;

    /** @noinspection PhpFieldAssignmentTypeMismatchInspection */
    protected function setUp(): void
    {
        parent::setUp();
        if (!self::$booted) {
            self::bootKernel();
        }

        $this->service = self::$container->get(SendMessageInterface::class);
    }

    private function getMessage(string $path = null): Message
    {
        $path = $path ?? \dirname(__DIR__) . '/data/bot-command-update.json';
        $requestContent = \file_get_contents($path);
        $request = Request::create('/webhook', 'POST', [], [], [], [], $requestContent);

        return $this->service->processRequest($request)->getMessage();
    }

    public function testServiceExists(): void
    {
        self::assertInstanceOf(SendMessageService::class, $this->service);
    }

    public function testIsSerializerCreated(): void
    {
        $serializer = (new ReflectionObject($this->service))->getProperty('serializer');
        $serializer->setAccessible(true);

        self::assertInstanceOf(SerializerInterface::class, $serializer->getValue($this->service));
    }

    public function testRequestProcess(): void
    {
        $contents = \file_get_contents(\dirname(__DIR__) . '/data/bot-command-update.json');
        $request = Request::create('/webhook', 'POST', [], [], [], [], $contents);
        /** @var Update $result */
        $result = $this->service->processRequest($request);

        self::assertInstanceOf(Update::class, $result);
        self::assertInstanceOf(Message::class, $result->getMessage());
    }

    public function testRequestProcessWithWrongData(): void
    {
        $contents = \file_get_contents(\dirname(__DIR__) . '/data/wrong-command.json');

        $request = Request::create('/webhook', 'POST', [], [], [], [], $contents);
        /** @var Update $result */
        $result = $this->service->processRequest($request);

        self::assertInstanceOf(Update::class, $result);
        self::assertInstanceOf(Message::class, $result->getMessage());
    }

    public function testMessageParts(): void
    {
        $message = $this->getMessage();
        self::assertNotEmpty($message->getMessageId());
        self::assertInstanceOf(TelegramUser::class, $message->getFrom());
        self::assertInstanceOf(Chat::class, $message->getChat());
        self::assertInstanceOf(\DateTimeInterface::class, $message->getDate());
        self::assertIsArray($message->getEntities());

        \array_map(static function ($ent) {
            self::assertInstanceOf(MessageEntity::class, $ent);
        }, $message->getEntities());
    }
}
