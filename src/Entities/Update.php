<?php
/**
 * User: andrew
 * Date: 30/03/2018
 * Time: 08:41.
 */

namespace TelegramBundle\Entities;

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
    private $updateId;

    /**
     * @var Message|null Optional. New incoming message of any kind — text, photo, sticker, etc.
     */
    private $message;

    /**
     * @var Message|null Optional. New version of a message that is known to the bot and was edited
     */
    private $editedMessage;

    /**
     * @var Message|null Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     */
    private $channelPost;

    /**
     * @var Message|null Optional. New version of a channel post that is known to the bot and was edited
     */
    private $editedChannelPost;

    /**
     * @var InlineQuery|null InlineQuery Optional. New incoming inline query
     *
     * @see https://core.telegram.org/bots/api#inlinequery
     */
    private $inlineQuery;

    /**
     * @var MethodInterface|null
     */
    private $answer;

    /**
     * @var User|null
     */
    private $from;

    /**
     * @var ChosenInlineResult|null ChosenInlineResult Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
     *
     * @see https://core.telegram.org/bots/api#choseninlineresult
     */
    private $chosenInlineResult;

    /**
     * @var CallbackQuery|null CallbackQuery Optional. New incoming callback query
     *
     * @see https://core.telegram.org/bots/api#callbackquery
     */
    private $callbackQuery;
}
