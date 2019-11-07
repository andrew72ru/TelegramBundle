<?php

namespace Helper;

use Codeception\Module;
use Faker\Factory;
use Faker\Generator;
use TelegramBundle\Entities\Chat;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Unit extends Module
{
    /**
     * @var Generator
     */
    private $faker;

    public function _beforeSuite($settings = [])
    {
        parent::_beforeSuite($settings);
        $this->faker = Factory::create();
    }

    /**
     * @return Generator
     */
    public function getFaker(): Generator
    {
        return $this->faker;
    }

    /**
     * @return object
     */
    public function getUserObject()
    {
        return (object) [
            'id' => $this->faker->randomNumber(),
            'is_bot' => false,
            'first_name' => $this->faker->firstNameMale,
            'username' => $this->faker->userName,
        ];
    }

    /**
     * @return object
     */
    public function getChatObject()
    {
        return (object) [
            'id' => $this->faker->randomNumber(),
            'type' => $this->faker->randomElement([Chat::TYPE_CHANNEL, Chat::TYPE_GROUP, Chat::TYPE_PRIVATE, Chat::TYPE_SUPERGROUP]),
            'title' => $this->faker->word,
            'username' => $this->faker->userName,
            'first_name' => $this->faker->firstNameMale,
            'last_name' => $this->faker->lastName,
        ];
    }

    /**
     * @return object
     */
    public function getMessageObject()
    {
        return (object) [
            'message_id' => $this->faker->randomNumber(),
            'from' => $this->getUserObject(),
            'date' => $this->faker->unixTime,
            'chat' => $this->getChatObject(),
            'text' => $this->faker->sentence(15),
        ];
    }

    /**
     * @return object
     */
    public function getInlineQueryObject()
    {
        return (object) [
            'id' => $this->faker->randomNumber(),
            'from' => $this->getUserObject(),
            'location' => null, // TODO: Implement location
            'query' => $this->faker->word,
            'offset' => $this->faker->word,
        ];
    }

    /**
     * @return object
     */
    public function getChosenInlineResultObject()
    {
        return (object) [
            'result_id' => (string) $this->faker->randomNumber(),
            'from' => $this->getUserObject(),
            'location' => null, // TODO: Implement location
            'inline_message_id' => (string) $this->faker->randomNumber(),
            'query' => $this->faker->word,
        ];
    }

    /**
     * @return object
     */
    public function getCallbackQueryObject()
    {
        return (object) [
            'id' => (string) $this->faker->randomNumber(),
            'from' => $this->getUserObject(),
            'message' => $this->getMessageObject(),
            'inline_message_id' => (string) $this->faker->randomNumber(),
            'chat_instance' => (string) $this->faker->randomNumber(),
            'data' => $this->faker->word,
        ];
    }
}
