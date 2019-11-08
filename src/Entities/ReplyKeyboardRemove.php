<?php
/**
 * 08.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class ReplyKeyboardRemove.
 *
 * @see https://core.telegram.org/bots/api#replykeyboardremove
 */
class ReplyKeyboardRemove
{
    /**
     * @var bool
     */
    private $removeKeyboard = true;

    /**
     * @var bool
     */
    private $selective = false;

    /**
     * @return bool
     */
    public function isRemoveKeyboard(): bool
    {
        return $this->removeKeyboard;
    }

    /**
     * @param bool $removeKeyboard
     *
     * @return ReplyKeyboardRemove
     */
    public function setRemoveKeyboard(bool $removeKeyboard): self
    {
        $this->removeKeyboard = $removeKeyboard;

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
     * @return ReplyKeyboardRemove
     */
    public function setSelective(bool $selective): self
    {
        $this->selective = $selective;

        return $this;
    }
}
