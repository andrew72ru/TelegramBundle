<?php
/**
 * User: andrew
 * Date: 29/05/2018
 * Time: 11:51.
 */
declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class KeyboardButton.
 *
 * @see https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends AbstractEntity
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var bool
     */
    private $requestContact = false;

    /**
     * @var bool
     */
    private $requestLocation = false;

}
