<?php
/**
 * User: andrew
 * Date: 29/05/2018
 * Time: 11:56.
 */
declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class InlineKeyboardMarkup.
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends AbstractEntity
{
    const PROPERTY_NAME = 'reply_markup';

    const FIELD_NAME = 'inline_keyboard';

    /**
     * @var array
     */
    private $inline_keyboard = [];

    /**
     * @return array
     */
    public function getInlineKeyboard(): array
    {
        return $this->inline_keyboard;
    }

    /**
     * @param array $inline_keyboard
     *
     * @return InlineKeyboardMarkup
     */
    public function setInlineKeyboard(array $inline_keyboard): InlineKeyboardMarkup
    {
        $this->inline_keyboard = $inline_keyboard;

        return $this;
    }

    /**
     * @param InlineKeyboardButton $button
     *
     * @return InlineKeyboardMarkup
     */
    public function addButton(InlineKeyboardButton $button): self
    {
        $this->inline_keyboard[] = [$button()];

        return $this;
    }

    /**
     * @param InlineKeyboardButton[] $buttons
     *
     * @return InlineKeyboardMarkup
     */
    public function addButtonsString(array $buttons): self
    {
        $arr = [];
        foreach ($buttons as $button) {
            $arr[] = $button();
        }

        $this->inline_keyboard[] = $arr;

        return $this;
    }
}
