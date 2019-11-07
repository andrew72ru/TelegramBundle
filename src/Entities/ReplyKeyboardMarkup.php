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
class ReplyKeyboardMarkup extends AbstractEntity
{
    const PROPERTY_NAME = 'reply_markup';

    /**
     * @var array
     */
    private $keyboard = [];

    /**
     * @var bool
     */
    private $resize_keyboard = true;

    /**
     * @var bool
     */
    private $one_time_keyboard = true;

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
     *
     * @return ReplyKeyboardMarkup
     */
    public function setKeyboard(array $keyboard): ReplyKeyboardMarkup
    {
        $this->keyboard = $keyboard;

        return $this;
    }

    /**
     * @param KeyboardButton $button
     *
     * @return ReplyKeyboardMarkup
     */
    public function addButton(KeyboardButton $button): self
    {
        $this->keyboard[] = [$button];

        return $this;
    }

    /**
     * @return bool
     */
    public function isResizeKeyboard(): bool
    {
        return $this->resize_keyboard;
    }

    /**
     * @param bool $resize_keyboard
     *
     * @return ReplyKeyboardMarkup
     */
    public function setResizeKeyboard(bool $resize_keyboard): ReplyKeyboardMarkup
    {
        $this->resize_keyboard = $resize_keyboard;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOneTimeKeyboard(): bool
    {
        return $this->one_time_keyboard;
    }

    /**
     * @param bool $one_time_keyboard
     *
     * @return ReplyKeyboardMarkup
     */
    public function setOneTimeKeyboard(bool $one_time_keyboard): ReplyKeyboardMarkup
    {
        $this->one_time_keyboard = $one_time_keyboard;

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
     *
     * @return ReplyKeyboardMarkup
     */
    public function setSelective(bool $selective): ReplyKeyboardMarkup
    {
        $this->selective = $selective;

        return $this;
    }
}
