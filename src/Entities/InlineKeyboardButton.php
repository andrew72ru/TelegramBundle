<?php
/**
 * User: andrew
 * Date: 29/05/2018
 * Time: 11:57.
 */
declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class InlineKeyboardButton.
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends AbstractEntity
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @var string|null
     */
    private $callbackData;

    /**
     * @var string|null
     */
    private $switchInlineQuery;

    /**
     * @var string|null
     */
    private $switch_inline_query_current_chat;

    /**
     * @var \StdClass|null
     */
    private $callbackGame;
    /**
     * @var bool
     */
    private $pay = false;
}
