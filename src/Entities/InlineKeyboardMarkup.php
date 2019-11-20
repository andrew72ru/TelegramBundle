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
class InlineKeyboardMarkup
{
    public const PROPERTY_NAME = 'reply_markup';

    public const FIELD_NAME = 'inline_keyboard';

    /**
     * @var array
     *            Array of button rows, each represented by an Array of @see InlineKeyboardButton objects
     */
    private $inlineKeyboard = [];

    /**
     * @return array
     */
    public function getInlineKeyboard(): array
    {
        return $this->inlineKeyboard;
    }

    /**
     * @param array $inlineKeyboard
     *
     * @return InlineKeyboardMarkup
     */
    public function setInlineKeyboard(array $inlineKeyboard): InlineKeyboardMarkup
    {
        $this->inlineKeyboard = $inlineKeyboard;

        return $this;
    }


    /**
     * @param InlineKeyboardButton $button
     *
     * @return InlineKeyboardMarkup
     */
    public function addButton(InlineKeyboardButton $button): self
    {
        $this->inlineKeyboard[] = [$button()];

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

        $this->inlineKeyboard[] = $arr;

        return $this;
    }

}
