<?php
/**
 * User: andrew
 * Date: 04/05/2018
 * Time: 09:01.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

use TelegramBundle\Exceptions\TelegramException;

/**
 * Class CallbackQuery.
 *
 * @see https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery extends AbstractEntity
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var User
     */
    private $from;

    /**
     * @var Message|null
     */
    private $message;

    /**
     * @var string|null
     */
    private $inline_message_id;

    /**
     * @var string global identifier, uniquely corresponding to the chat to which the message with the callback button was sent
     */
    private $chat_instance;

    /**
     * @var string|null data associated with the callback button
     */
    private $data;

    /**
     * @var string|null
     */
    private $game_short_name;

    /**
     * CallbackQuery constructor.
     *
     * @param \StdClass $callbackQuery
     */
    public function __construct(\StdClass $callbackQuery)
    {
        foreach (get_object_vars($this) as $objectVar => $value) {
            $method = self::formatString($objectVar);
            if (method_exists($this, $method) && property_exists($callbackQuery, $objectVar)) {
                $this->{$method}($callbackQuery->{$objectVar});
            }
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return CallbackQuery
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param \StdClass $from
     *
     * @return CallbackQuery
     */
    public function setFrom(\StdClass $from): self
    {
        $this->from = new User($from);

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * @param \StdClass|null $message
     *
     * @return CallbackQuery
     */
    public function setMessage(?\StdClass $message): self
    {
        if (!is_null($message)) {
            try {
                $this->message = new Message($message);
            } catch (TelegramException $e) {
                $this->message = null;
            }
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * @param string|null $inline_message_id
     *
     * @return CallbackQuery
     */
    public function setInlineMessageId(?string $inline_message_id): self
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getChatInstance(): string
    {
        return $this->chat_instance;
    }

    /**
     * @param string $chat_instance
     *
     * @return CallbackQuery
     */
    public function setChatInstance(string $chat_instance): self
    {
        $this->chat_instance = $chat_instance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string|null $data
     *
     * @return CallbackQuery
     */
    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->game_short_name;
    }

    /**
     * @param string|null $game_short_name
     *
     * @return CallbackQuery
     */
    public function setGameShortName(?string $game_short_name): self
    {
        $this->game_short_name = $game_short_name;

        return $this;
    }
}
