<?php
/**
 * User: andrew
 * Date: 30/03/2018
 * Time: 08:41.
 */

namespace TelegramBundle\Entities;

use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Update object received from telegram bot.
 */
class Update
{
    /**
     * @var int|null The update‘s unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
     */
    private ?int $updateId = null;

    /**
     * @var Message|null Optional. New incoming message of any kind — text, photo, sticker, etc.
     */
    private ?Message $message = null;

    /**
     * @var Message|null Optional. New version of a message that is known to the bot and was edited
     */
    private ?Message $editedMessage = null;

    /**
     * @var Message|null Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     */
    private ?Message $channelPost = null;

    /**
     * @var Message|null Optional. New version of a channel post that is known to the bot and was edited
     */
    private ?Message $editedChannelPost = null;

    /**
     * @var InlineQuery|null InlineQuery Optional. New incoming inline query
     *
     * @see https://core.telegram.org/bots/api#inlinequery
     */
    private ?InlineQuery $inlineQuery = null;

    /**
     * @var ChosenInlineResult|null ChosenInlineResult Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
     *
     * @see https://core.telegram.org/bots/api#choseninlineresult
     */
    private ?ChosenInlineResult $chosenInlineResult = null;

    /**
     * @var CallbackQuery|null CallbackQuery Optional. New incoming callback query
     *
     * @see https://core.telegram.org/bots/api#callbackquery
     */
    private ?CallbackQuery $callbackQuery = null;

    /**
     * @var ResponseInterface|null
     */
    private ?ResponseInterface $response = null;

    /**
     * @return int|null
     */
    public function getUpdateId(): ?int
    {
        return $this->updateId;
    }

    /**
     * @param int $updateId
     *
     * @return Update
     */
    public function setUpdateId(int $updateId): self
    {
        $this->updateId = $updateId;

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
     * @return Update
     */
    public function setMessage(?Message $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedMessage(): ?Message
    {
        return $this->editedMessage;
    }

    /**
     * @param Message|null $editedMessage
     *
     * @return Update
     */
    public function setEditedMessage(?Message $editedMessage): self
    {
        $this->editedMessage = $editedMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getChannelPost(): ?Message
    {
        return $this->channelPost;
    }

    /**
     * @param Message|null $channelPost
     *
     * @return Update
     */
    public function setChannelPost(?Message $channelPost): self
    {
        $this->channelPost = $channelPost;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedChannelPost(): ?Message
    {
        return $this->editedChannelPost;
    }

    /**
     * @param Message|null $editedChannelPost
     *
     * @return Update
     */
    public function setEditedChannelPost(?Message $editedChannelPost): self
    {
        $this->editedChannelPost = $editedChannelPost;

        return $this;
    }

    /**
     * @return InlineQuery|null
     */
    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inlineQuery;
    }

    /**
     * @param InlineQuery|null $inlineQuery
     *
     * @return Update
     */
    public function setInlineQuery(?InlineQuery $inlineQuery): self
    {
        $this->inlineQuery = $inlineQuery;

        return $this;
    }

    /**
     * @return ChosenInlineResult|null
     */
    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosenInlineResult;
    }

    /**
     * @param ChosenInlineResult|null $chosenInlineResult
     *
     * @return Update
     */
    public function setChosenInlineResult(?ChosenInlineResult $chosenInlineResult): self
    {
        $this->chosenInlineResult = $chosenInlineResult;

        return $this;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callbackQuery;
    }

    /**
     * @param CallbackQuery|null $callbackQuery
     *
     * @return Update
     */
    public function setCallbackQuery(?CallbackQuery $callbackQuery): self
    {
        $this->callbackQuery = $callbackQuery;

        return $this;
    }

    /**
     * @return ResponseInterface|null
     */
    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface|null $response
     *
     * @return Update
     */
    public function setResponse(?ResponseInterface $response): self
    {
        $this->response = $response;

        return $this;
    }
}
