<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 17:50.
 */

namespace TelegramBundle\Methods;

/**
 * Send message with form.
 */
class SendMessage extends AbstractMethod
{
    public const PARSE_MODE_MD = 'Markdown';
    public const PARSE_MODE_HTML = 'HTML';

    /**
     * @var string Name of telegram method
     */
    public $methodName = 'sendMessage';

    /**
     * @var string
     */
    private $chat_id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $parse_mode;

    /**
     * @var bool
     */
    private $disable_web_page_preview = false;

    /**
     * @var bool
     */
    private $disable_notification = false;

    /**
     * @var string|null
     */
    private $reply_to_message_id = null;

    /**
     * @var array
     */
    private $reply_markup = [];

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
        $this->chat_id = $chatId;

        $this->setOptions($options);
    }

    /**
     * @param array $reply_markup
     *
     * @return SendMessage
     */
    public function setReplyMarkup(array $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        $result = [
            'chat_id' => $this->chat_id,
            'text' => $this->text,
            'parse_mode' => $this->parse_mode,
            'disable_web_page_preview' => $this->disable_web_page_preview,
            'disable_notification' => $this->disable_notification,
        ];

        if (null !== $this->reply_to_message_id) {
            $result['reply_to_message_id'] = $this->reply_to_message_id;
        }

        if (!empty($this->reply_markup)) {
            $result['reply_markup'] = json_encode($this->reply_markup, JSON_THROW_ON_ERROR);
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
