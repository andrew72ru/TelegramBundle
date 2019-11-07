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
    private $inlineMessageId;

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
    private $gameShortName;

}
