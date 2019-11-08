<?php
/**
 * 08.11.2019
 */

declare(strict_types=1);


namespace App\Tests\Service;


use App\Tests\TestCase;
use Symfony\Component\Serializer\SerializerInterface;
use TelegramBundle\Entities\CallbackQuery;
use TelegramBundle\Entities\InlineKeyboardMarkup;
use TelegramBundle\Entities\Message;
use TelegramBundle\Entities\Update;

class SerializationTest extends TestCase
{
    private $path;

    protected function setUp(): void
    {
        parent::setUp();

        $this->path = dirname(__DIR__) . '/data';
    }

    public function testSerializerExists(): void
    {
        $this->assertInstanceOf(SerializerInterface::class, $this->serializer);
    }

    public function testBotCommandMessage(): void
    {
        $json = \file_get_contents($this->path . '/bot-command-message.json');
        /** @var Update $data */
        $data = $this->serializer->deserialize($json, Update::class, 'json');

        $this->assertInstanceOf(Update::class, $data);
        $this->assertInstanceOf(Message::class, $data->getMessage());
        $this->assertEquals('Dumkaaa', $data->getMessage()->getFrom()->getUsername());
        $this->assertIsArray($data->getMessage()->getEntities());
        $this->assertEquals('ru', $data->getMessage()->getFrom()->getLanguageCode());
    }

    public function testReplyMarkupMessage(): void
    {
        $json = \file_get_contents($this->path . '/reply-markup-message.json');
        /** @var Update $data */
        $data = $this->serializer->deserialize($json, Update::class, 'json');

        $this->assertNull($data->getMessage());
        $this->assertInstanceOf(CallbackQuery::class, $data->getCallbackQuery());
        $this->assertInstanceOf(Message::class, $data->getCallbackQuery()->getMessage());
        $this->assertInstanceOf(InlineKeyboardMarkup::class, $data->getCallbackQuery()->getMessage()->getReplyMarkup());
    }

    public function testCallbackQueryMessage(): void
    {
        $json = \file_get_contents($this->path . '/callback-query-message.json');
        /** @var Update $data */
        $data = $this->serializer->deserialize($json, Update::class, 'json');

        $this->assertNull($data->getMessage());
        $this->assertEquals('oleg_koltsov', $data->getCallbackQuery()->getFrom()->getUsername());
    }
}
