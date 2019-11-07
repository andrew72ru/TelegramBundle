<?php
/**
 * User: andrew
 * Date: 04/05/2018
 * Time: 09:28.
 */

namespace TelegramBundle\Methods;

/**
 * Class answerCallbackQuery.
 *
 * @see https://core.telegram.org/bots/api#answercallbackquery
 */
class answerCallbackQuery extends AbstractMethod
{
    /**
     * @var string Name of telegram method
     */
    public $methodName = 'answerCallbackQuery';

    /**
     * @var string Unique identifier for the query to be answered
     */
    private $callback_query_id;

    /**
     * @var string|null Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
     */
    private $text;

    /**
     * @var bool If true, an alert will be shown by the client instead of a notification at the top of the chat screen
     */
    private $show_alert = false;

    /**
     * @var string|null URL that will be opened by the user's client
     */
    private $url;

    /**
     * @var int|null the maximum amount of time in seconds that the result of the callback query may be cached client-side
     */
    private $cache_time;

    public function __construct(string $callback_query_id)
    {
        $this->callback_query_id = $callback_query_id;
    }

    /**
     * @return string
     */
    public function getCallbackQueryId(): string
    {
        return $this->callback_query_id;
    }

    /**
     * @param string $callback_query_id
     *
     * @return answerCallbackQuery
     */
    public function setCallbackQueryId(string $callback_query_id): self
    {
        $this->callback_query_id = $callback_query_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return answerCallbackQuery
     */
    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShowAlert(): bool
    {
        return $this->show_alert;
    }

    /**
     * @param bool $show_alert
     *
     * @return answerCallbackQuery
     */
    public function setShowAlert(bool $show_alert): self
    {
        $this->show_alert = $show_alert;

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
     * @return answerCallbackQuery
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCacheTime(): ?int
    {
        return $this->cache_time;
    }

    /**
     * @param int|null $cache_time
     *
     * @return answerCallbackQuery
     */
    public function setCacheTime(?int $cache_time): self
    {
        $this->cache_time = $cache_time;

        return $this;
    }

    /**
     * Telegram method name.
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->methodName;
    }

    /**
     * Return array with Telegram method parameters as keys and parameters keys as values.
     *
     * @see https://core.telegram.org/bots/api#available-methods
     *
     * @return array
     */
    public function __toArray(): array
    {
        $result = [
            'callback_query_id' => (string) $this->callback_query_id,
        ];
        if (null !== $this->getText()) {
            $result['text'] = $this->getText();
        }
        if ($this->isShowAlert()) {
            $result['show_alert'] = $this->isShowAlert();
        }
        if (null !== $this->getUrl()) {
            $result['url'] = $this->getUrl();
        }
        if (null !== $this->getCacheTime()) {
            $result['cache_time'] = $this->getCacheTime();
        }

        return $result;
    }
}
