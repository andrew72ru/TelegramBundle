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
class InlineKeyboardButton
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
    private $switchInlineQueryCurrentChat;

    /**
     * @var \StdClass|null
     */
    private $callbackGame;

    /**
     * @var bool
     *           Optional. Specify True, to send a Pay button.
     *           NOTE: This type of button must always be the first button in the first row.
     */
    private $pay = false;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return InlineKeyboardButton
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     *
     * @return InlineKeyboardButton
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCallbackData(): ?string
    {
        return $this->callbackData;
    }

    /**
     * @param string|null $callbackData
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switchInlineQuery;
    }

    /**
     * @param string|null $switchInlineQuery
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQuery(?string $switchInlineQuery): self
    {
        $this->switchInlineQuery = $switchInlineQuery;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switchInlineQueryCurrentChat;
    }

    /**
     * @param string|null $switchInlineQueryCurrentChat
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryCurrentChat(?string $switchInlineQueryCurrentChat): self
    {
        $this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;

        return $this;
    }

    /**
     * @return \StdClass|null
     */
    public function getCallbackGame(): ?\StdClass
    {
        return $this->callbackGame;
    }

    /**
     * @param \StdClass|null $callbackGame
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackGame(?\StdClass $callbackGame): self
    {
        $this->callbackGame = $callbackGame;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPay(): bool
    {
        return $this->pay;
    }

    /**
     * @param bool $pay
     *
     * @return InlineKeyboardButton
     */
    public function setPay(bool $pay): self
    {
        $this->pay = $pay;

        return $this;
    }
}
