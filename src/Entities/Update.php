<?php
/**
 * User: andrew
 * Date: 30/03/2018
 * Time: 08:41.
 */

namespace TelegramBundle\Entities;

use Psr\Http\Message\ResponseInterface;
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Interfaces\MethodInterface;

/**
 * Update object received from telegram bot.
 */
class Update extends AbstractEntity
{
    /**
     * @var int|null
     */
    private $chatId;

    /**
     * @var int The update‘s unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
     */
    private $update_id;

    /**
     * @var Message|null Optional. New incoming message of any kind — text, photo, sticker, etc.
     */
    private $message;

    /**
     * @var Message|null Optional. New version of a message that is known to the bot and was edited
     */
    private $edited_message;

    /**
     * @var Message|null Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     */
    private $channel_post;

    /**
     * @var Message|null Optional. New version of a channel post that is known to the bot and was edited
     */
    private $edited_channel_post;

    /**
     * @var InlineQuery|null InlineQuery Optional. New incoming inline query
     *
     * @see https://core.telegram.org/bots/api#inlinequery
     */
    private $inline_query;

    /**
     * @var MethodInterface|null
     */
    private $answer;

    /**
     * @var ResponseInterface|null
     */
    private $response;

    /**
     * @var User|null
     */
    private $from;

    /**
     * @var ChosenInlineResult|null ChosenInlineResult Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
     *
     * @see https://core.telegram.org/bots/api#choseninlineresult
     */
    private $chosen_inline_result;

    /**
     * @var CallbackQuery|null CallbackQuery Optional. New incoming callback query
     *
     * @see https://core.telegram.org/bots/api#callbackquery
     */
    private $callback_query;

    public function __construct(\StdClass $update)
    {
        foreach (get_object_vars($this) as $objectVar => $value) {
            $method = AbstractEntity::formatString($objectVar);
            if (method_exists($this, $method) && property_exists($update, $objectVar)) {
                $this->{$method}($update->{$objectVar});
            }
        }
    }

    public function getAnswer(): ?MethodInterface
    {
        return $this->answer;
    }

    /**
     * @param MethodInterface $method
     *
     * @return Update
     */
    public function setAnswer(MethodInterface $method): self
    {
        $this->answer = $method;

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
     * @param ResponseInterface $response
     *
     * @return Update
     */
    public function setResponse(ResponseInterface $response): self
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getChatId(): ?int
    {
        return $this->chatId;
    }

    /**
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    /**
     * @param int $update_id
     *
     * @return Update
     */
    public function setUpdateId(int $update_id): self
    {
        $this->update_id = $update_id;

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
     * @return Update
     *
     * @throws TelegramException
     */
    public function setMessage(?\StdClass $message): self
    {
        if (!is_null($message)) {
            $this->message = new Message($message);
            $this->chatId = $this->message->getChat()->getId();
            $this->from = $this->message->getFrom();
        }

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedMessage(): ?Message
    {
        return $this->edited_message;
    }

    /**
     * @param \StdClass|null $edited_message
     *
     * @return Update
     *
     * @throws TelegramException
     */
    public function setEditedMessage(?\StdClass $edited_message): self
    {
        if (!is_null($edited_message)) {
            $this->edited_message = new Message($edited_message);
            $this->chatId = $this->edited_message->getChat()->getId();
            $this->from = $this->edited_message->getFrom();
        }

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getChannelPost(): ?Message
    {
        return $this->channel_post;
    }

    /**
     * @param \StdClass|null $channel_post
     *
     * @return Update
     *
     * @throws TelegramException
     */
    public function setChannelPost(?\StdClass $channel_post): self
    {
        if (!is_null($channel_post)) {
            $this->channel_post = new Message($channel_post);
            $this->chatId = $this->channel_post->getChat()->getId();
            $this->from = $this->channel_post->getFrom();
        }

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedChannelPost(): ?Message
    {
        return $this->edited_channel_post;
    }

    /**
     * @param \StdClass|null $edited_channel_post
     *
     * @return Update
     *
     * @throws TelegramException
     */
    public function setEditedChannelPost(?\StdClass $edited_channel_post): self
    {
        if (!is_null($edited_channel_post)) {
            $this->edited_channel_post = new Message($edited_channel_post);
            $this->chatId = $this->edited_channel_post->getChat()->getId();
        }

        return $this;
    }

    /**
     * @return InlineQuery|null
     */
    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inline_query;
    }

    /**
     * @param \StdClass|null $inline_query
     *
     * @return Update
     */
    public function setInlineQuery(?\StdClass $inline_query): self
    {
        if (!is_null($inline_query)) {
            $this->inline_query = new InlineQuery($inline_query);
        }

        return $this;
    }

    /**
     * @return ChosenInlineResult|null
     */
    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosen_inline_result;
    }

    /**
     * @param \StdClass|null $chosen_inline_result
     *
     * @return Update
     */
    public function setChosenInlineResult(?\StdClass $chosen_inline_result): self
    {
        if (!is_null($chosen_inline_result)) {
            $this->chosen_inline_result = new ChosenInlineResult($chosen_inline_result);
        }

        return $this;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callback_query;
    }

    /**
     * @param \StdClass $callback_query
     *
     * @return Update
     */
    public function setCallbackQuery(\StdClass $callback_query): self
    {
        if (!is_null($callback_query)) {
            $this->callback_query = new CallbackQuery($callback_query);
            $this->chatId = $this->callback_query->getMessage()->getChat()->getId();
            $this->from = $this->callback_query->getFrom();
        }

        return $this;
    }

    /**
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }
}
