<?php
/**
 * User: andrew
 * Date: 04/05/2018
 * Time: 09:01.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class CallbackQuery.
 *
 * @see https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery
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
    private $inlineMessageId;

    /**
     * @var string global identifier, uniquely corresponding to the chat to which the message with the callback button was sent
     */
    private $chatInstance;

    /**
     * @var string|null data associated with the callback button
     */
    private $data;

    /**
     * @var string|null
     */
    private $gameShortName;

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
     * @param User $from
     *
     * @return CallbackQuery
     */
    public function setFrom(User $from): self
    {
        $this->from = $from;

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
     * @param Message|null $message
     *
     * @return CallbackQuery
     */
    public function setMessage(?Message $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string|null $inlineMessageId
     *
     * @return CallbackQuery
     */
    public function setInlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;

        return $this;
    }

    /**
     * @return string
     */
    public function getChatInstance(): string
    {
        return $this->chatInstance;
    }

    /**
     * @param string $chatInstance
     *
     * @return CallbackQuery
     */
    public function setChatInstance(string $chatInstance): self
    {
        $this->chatInstance = $chatInstance;

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
        return $this->gameShortName;
    }

    /**
     * @param string|null $gameShortName
     *
     * @return CallbackQuery
     */
    public function setGameShortName(?string $gameShortName): self
    {
        $this->gameShortName = $gameShortName;

        return $this;
    }
}
