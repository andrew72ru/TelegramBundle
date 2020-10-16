<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 17:50.
 */

namespace TelegramBundle\Methods;

use TelegramBundle\Entities\InlineKeyboardMarkup;

/**
 * Send message with form.
 */
class SendMessage extends AbstractMethod
{
    /**
     * @var string Name of telegram method
     */
    public $methodName = 'sendMessage';

    /**
     * @var string
     */
    private $chatId;

    /**
     * @var string|null
     */
    private $text;

    /**
     * @var string
     */
    private $parseMode;

    /**
     * @var bool
     */
    private $disableWebPagePreview = false;

    /**
     * @var bool
     */
    private $disableNotification = false;

    /**
     * @var string|null
     */
    private $replyToMessage_id = null;

    /**
     * @var array
     */
    private $replyMarkup = [];

    /**
     * SendMessage constructor.
     *
     * @param string      $chatId
     * @param string|null $message
     * @param array       $options
     */
    public function __construct(string $chatId, string $message = null, array $options = [])
    {
        $options = array_merge($options, self::$defaultOptions);
        $this->text = $message;
        $this->chatId = $chatId;

        $this->setOptions($options);
    }

    /**
     * @param array $replyMarkup
     *
     * @return SendMessage
     */
    public function setReplyMarkup(array $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;

        return $this;
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        $result = \array_merge(self::$defaultOptions, [
            'chat_id' => $this->chatId,
            'text' => $this->text,
            'disable_web_page_preview' => $this->disableWebPagePreview,
            'disable_notification' => $this->disableNotification,
        ]);
        if ($this->parseMode !== null) {
            $result['parse_mode'] = $this->parseMode;
        }

        if (null !== $this->replyToMessage_id) {
            $result['reply_to_message_id'] = $this->replyToMessage_id;
        }

        if (!empty($this->replyMarkup)) {
            $result['reply_markup'] = (\count($this->replyMarkup) === 1 && \key($this->replyMarkup) === InlineKeyboardMarkup::FIELD_NAME)
                ? $this->replyMarkup
                : [InlineKeyboardMarkup::FIELD_NAME => $this->replyMarkup];
        }

        return $result;
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
}
