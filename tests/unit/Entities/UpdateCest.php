<?php

namespace Entities;

use Codeception\Stub;
use Psr\Http\Message\ResponseInterface;
use TelegramBundle\Entities\CallbackQuery;
use TelegramBundle\Entities\Chat;
use TelegramBundle\Entities\ChosenInlineResult;
use TelegramBundle\Entities\InlineQuery;
use TelegramBundle\Entities\Message;
use TelegramBundle\Entities\Update;
use TelegramBundle\Entities\User;
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Interfaces\MethodInterface;

class UpdateCest
{
    public function tryCreateClass(\UnitTester $I)
    {
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update);
    }

    public function tryToSetUpdateId(\UnitTester $I)
    {
        $start = (object) ['update_id' => $I->getFaker()->numberBetween(6000, 9000)];
        $update = new Update($start);
        $I->assertEquals($start->update_id, $update->getUpdateId());
    }

    public function tryToSetMessage(\UnitTester $I)
    {
        $userObject = $I->getUserObject();
        $user = new User($userObject);
        $I->assertInstanceOf(User::class, $user);

        $chatObject = $I->getChatObject();
        $chat = new Chat($chatObject);
        $I->assertInstanceOf(Chat::class, $chat);

        $updateObject = (object) [
            'update_id' => $I->getFaker()->randomNumber(),
            'message' => $I->getMessageObject(),
        ];
        $update = new Update($updateObject);
        $I->assertInstanceOf(Update::class, $update);

        $I->assertInstanceOf(Message::class, $update->getMessage());

        $I->assertEquals($update->getMessage()->getChat()->getId(), $update->getChatId());
        $I->assertEquals($update->getMessage()->getFrom(), $update->getFrom());
        $I->assertInstanceOf(User::class, $update->getFrom());
    }

    /**
     * @throws \Exception
     */
    public function setAndGetAnswer(\UnitTester $I)
    {
        /** @var MethodInterface $method */
        $method = Stub::makeEmpty(MethodInterface::class, []);
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update);
        $I->assertInstanceOf(Update::class, $update->setAnswer($method));
        $I->assertInstanceOf(MethodInterface::class, $update->getAnswer());
    }

    /**
     * @throws \Exception
     */
    public function setAndGetResponse(\UnitTester $I)
    {
        /** @var ResponseInterface $response */
        $response = Stub::makeEmpty(ResponseInterface::class, [
            'withStatus' => function () { return 200; },
        ]);
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update->setResponse($response));
        $I->assertInstanceOf(ResponseInterface::class, $update->getResponse());
    }

    /**
     * @throws TelegramException
     */
    public function setAndGetEditedMessage(\UnitTester $I)
    {
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update->setEditedMessage($I->getMessageObject()));
        $I->assertInstanceOf(Message::class, $update->getEditedMessage());
    }

    /**
     * @throws TelegramException
     */
    public function setAndGetChannelPost(\UnitTester $I)
    {
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update->setChannelPost($I->getMessageObject()));
        $I->assertInstanceOf(Message::class, $update->getChannelPost());

        $I->assertInstanceOf(Update::class, $update->setEditedChannelPost($I->getMessageObject()));
        $I->assertInstanceOf(Message::class, $update->getEditedChannelPost());
    }

    public function setAndGetInlineQuery(\UnitTester $I)
    {
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update->setInlineQuery($I->getInlineQueryObject()));
        $I->assertInstanceOf(InlineQuery::class, $update->getInlineQuery());
    }

    public function getAndSetChosenInlineResult(\UnitTester $I)
    {
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update->setChosenInlineResult($I->getChosenInlineResultObject()));
        $I->assertInstanceOf(ChosenInlineResult::class, $update->getChosenInlineResult());
    }

    public function getAndSetCallbackQuery(\UnitTester $I)
    {
        $update = new Update((object) []);
        $I->assertInstanceOf(Update::class, $update->setCallbackQuery($I->getCallbackQueryObject()));
        $I->assertInstanceOf(CallbackQuery::class, $update->getCallbackQuery());
    }
}
