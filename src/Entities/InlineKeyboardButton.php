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
    private $callback_data;

    /**
     * @var string|null
     */
    private $switch_inline_query;

    /**
     * @var string|null
     */
    private $switch_inline_query_current_chat;

    /**
     * @var \StdClass|null
     */
    private $callback_game;
    /**
     * @var bool
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
    public function setText(string $text): InlineKeyboardButton
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
    public function setUrl(?string $url): InlineKeyboardButton
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCallbackData(): ?string
    {
        return $this->callback_data;
    }

    /**
     * @param string|null $callback_data
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackData(?string $callback_data): InlineKeyboardButton
    {
        $this->callback_data = $callback_data;

        return $this;
    }

    /**
     * @param array $callback_data
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackDataFromArray(array $callback_data): InlineKeyboardButton
    {
        $this->callback_data = json_encode($callback_data);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switch_inline_query;
    }

    /**
     * @param string|null $switch_inline_query
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQuery(?string $switch_inline_query): InlineKeyboardButton
    {
        $this->switch_inline_query = $switch_inline_query;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switch_inline_query_current_chat;
    }

    /**
     * @param string|null $switch_inline_query_current_chat
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryCurrentChat(?string $switch_inline_query_current_chat): InlineKeyboardButton
    {
        $this->switch_inline_query_current_chat = $switch_inline_query_current_chat;

        return $this;
    }

    /**
     * @return \StdClass|null
     */
    public function getCallbackGame(): ?\StdClass
    {
        return $this->callback_game;
    }

    /**
     * @param \StdClass|null $callback_game
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackGame(?\StdClass $callback_game): InlineKeyboardButton
    {
        $this->callback_game = $callback_game;

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
    public function setPay(bool $pay): InlineKeyboardButton
    {
        $this->pay = $pay;

        return $this;
    }

    /**
     * @return array
     */
    public function __invoke(): array
    {
        $result = [
            'text' => $this->getText(),
        ];

        if ($this->getUrl()) {
            $result['url'] = $this->getUrl();
        }

        if ($this->getCallbackData()) {
            $result['callback_data'] = $this->getCallbackData();
        }

        if ($this->isPay()) {
            $result['pay'] = $this->isPay();
        }

        if ($this->getSwitchInlineQuery()) {
            $result['switch_inline_query'] = $this->getSwitchInlineQuery();
        }

        if ($this->getSwitchInlineQueryCurrentChat()) {
            $result['switch_inline_query_current_chat'] = $this->getSwitchInlineQueryCurrentChat();
        }

        return $result;
    }
}
