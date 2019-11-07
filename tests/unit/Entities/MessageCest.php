<?php

namespace Entities;

use TelegramBundle\Entities\Chat;
use TelegramBundle\Entities\Message;
use TelegramBundle\Entities\User;
use TelegramBundle\Exceptions\TelegramException;

class MessageCest
{
    /**
     * @var Message
     */
    private $defaultMessage;

    /**
     * @throws TelegramException
     */
    public function _before(\UnitTester $I)
    {
        $this->defaultMessage = new Message($I->getMessageObject());
    }

    /**
     * @throws TelegramException
     */
    public function tryToCreateClass(\UnitTester $I)
    {
        $message = new Message($I->getMessageObject());
        $I->assertInstanceOf(Message::class, $message);
        $str = json_encode($I->getMessageObject());

        $message = new Message($str);
        $I->assertInstanceOf(Message::class, $message);

        $I->expectException(
            TelegramException::class,
            function () {
                new Message('{\'invalid json');
            }
        );
    }

    /**
     * @throws TelegramException
     */
    public function setAndGetSourceMessage(\UnitTester $I)
    {
        $message = new Message($I->getMessageObject());
        $newSource = $I->getMessageObject();
        $message->setSourceMessage($newSource);
        $I->assertEquals($newSource, $message->getSourceMessage());
    }

    public function setAndGetMessageId(\UnitTester $I)
    {
        $I->assertNotNull($this->defaultMessage->getMessageId());
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setMessageId('4'));
        $I->assertEquals(4, $this->defaultMessage->getMessageId());
    }

    public function setAndGetFrom(\UnitTester $I)
    {
        $I->assertInstanceOf(User::class, $this->defaultMessage->getFrom());
        $newUser = $I->getUserObject();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setFrom($newUser));
        $I->assertEquals(new User($newUser), $this->defaultMessage->getFrom());
    }

    public function setAndGetDate(\UnitTester $I)
    {
        $I->assertNotNull($this->defaultMessage->getDate());
        $newDate = $I->getFaker()->unixTime;
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setDate($newDate));
        $I->assertEquals($newDate, $this->defaultMessage->getDate());
    }

    public function setAndGetChat(\UnitTester $I)
    {
        $I->assertInstanceOf(Chat::class, $this->defaultMessage->getChat());
        $newChat = $I->getChatObject();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setChat($newChat));
        $I->assertInstanceOf(Chat::class, $this->defaultMessage->getChat());
        $I->assertEquals(new Chat($newChat), $this->defaultMessage->getChat());
    }

    public function setAndGetForwardFrom(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getForwardFrom());
        $user = $I->getUserObject();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setForwardFrom($user));
        $I->assertInstanceOf(User::class, $this->defaultMessage->getForwardFrom());
        $I->assertEquals(new User($user), $this->defaultMessage->getForwardFrom());
    }

    public function getAndSetForwardFromChat(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getForwardFromChat());
        $chat = $I->getChatObject();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setForwardFromChat($chat));
        $I->assertEquals(new Chat($chat), $this->defaultMessage->getForwardFromChat());
    }

    public function setAndGetForwardFromMessageId(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getForwardFromMessageId());
        $id = $I->getFaker()->randomNumber();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setForwardFromMessageId($id));
        $I->assertEquals($id, $this->defaultMessage->getForwardFromMessageId());
    }

    public function setAndGetForwardSignature(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getForwardSignature());
        $sign = (string) $I->getFaker()->randomNumber();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setForwardSignature($sign));
        $I->assertEquals($sign, $this->defaultMessage->getForwardSignature());
    }

    public function setAndGetForwardDate(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getForwardDate());
        $date = $I->getFaker()->unixTime;
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setForwardDate($date));
        $I->assertEquals($date, $this->defaultMessage->getForwardDate());
    }

    /**
     * @throws TelegramException
     */
    public function setAndGetReplyToMessage(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getReplyToMessage());
        $message = $I->getMessageObject();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setReplyToMessage($message));
        $I->assertEquals(new Message($message), $this->defaultMessage->getReplyToMessage());
    }

    public function setAndGetEditDate(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getEditDate());
        $date = $I->getFaker()->unixTime;
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setEditDate($date));
        $I->assertEquals($date, $this->defaultMessage->getEditDate());
    }

    public function setAndGetMediaGroupId(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getMediaGroupId());
        $id = (string) $I->getFaker()->randomNumber();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setMediaGroupId($id));
        $I->assertEquals($id, $this->defaultMessage->getMediaGroupId());
    }

    public function setAndGetAuthorSignature(\UnitTester $I)
    {
        $I->assertEmpty($this->defaultMessage->getAuthorSignature());
        $sign = (string) $I->getFaker()->randomNumber();
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setAuthorSignature($sign));
        $I->assertEquals($sign, $this->defaultMessage->getAuthorSignature());
    }

    public function setAndGetText(\UnitTester $I)
    {
        $I->assertNotEmpty($this->defaultMessage->getText());
        $text = $I->getFaker()->sentence;
        $I->assertInstanceOf(Message::class, $this->defaultMessage->setText($text));
        $I->assertEquals($text, $this->defaultMessage->getText());
    }
}
