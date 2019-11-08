<?php
/**
 * User: andrew
 * Date: 29/05/2018
 * Time: 11:36.
 */
declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class ReplyKeyboardMarkup.
 *
 * @see https://core.telegram.org/bots/api#replykeyboardmarkup
 */
class ReplyKeyboardMarkup
{
    const PROPERTY_NAME = 'reply_markup';

    /**
     * @var array
     * Array of button rows, each represented by an Array of @see KeyboardButton objects
     */
    private $keyboard = [];

    /**
     * @var bool
     */
    private $resizeKeyboard = true;

    /**
     * @var bool
     */
    private $oneTimeKeyboard = true;

    /**
     * @var bool
     */
    private $selective = false;

    /**
     * @return array
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @param array $keyboard
     * @return ReplyKeyboardMarkup
     */
    public function setKeyboard($keyboard): self
    {
        $this->keyboard = $keyboard;
        return $this;
    }

    /**
     * @return bool
     */
    public function isResizeKeyboard(): bool
    {
        return $this->resizeKeyboard;
    }

    /**
     * @param bool $resizeKeyboard
     * @return ReplyKeyboardMarkup
     */
    public function setResizeKeyboard(bool $resizeKeyboard): self
    {
        $this->resizeKeyboard = $resizeKeyboard;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOneTimeKeyboard(): bool
    {
        return $this->oneTimeKeyboard;
    }

    /**
     * @param bool $oneTimeKeyboard
     * @return ReplyKeyboardMarkup
     */
    public function setOneTimeKeyboard(bool $oneTimeKeyboard): self
    {
        $this->oneTimeKeyboard = $oneTimeKeyboard;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSelective(): bool
    {
        return $this->selective;
    }

    /**
     * @param bool $selective
     * @return ReplyKeyboardMarkup
     */
    public function setSelective(bool $selective): self
    {
        $this->selective = $selective;
        return $this;
    }
}
