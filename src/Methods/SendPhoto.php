<?php
/**
 * User: andrew
 * Date: 31/03/2018
 * Time: 15:13.
 */

namespace TelegramBundle\Methods;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class SendPhoto extends AbstractMethod
{
    /**
     * @var string Name of telegram method
     */
    public $methodName = 'sendPhoto';

    /**
     * @var int|string Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     */
    protected $chat_id;

    /**
     * @var string|resource Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data
     */
    protected $photo;

    /**
     * @var string|null Photo caption (may also be used when resending photos by file_id), 0-200 characters
     */
    protected $caption;

    /**
     * @var string
     */
    protected $parse_mode;

    /**
     * @var bool|null Sends the message silently. Users will receive a notification with no sound.
     */
    protected $disable_notification;

    /**
     * @var int|null If the message is a reply, ID of the original message
     */
    protected $reply_to_message_id;

    /**
     * @var \StdClass|null Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     */
    protected $reply_markup;

    public function __construct($chatId, $file = null, array $options = [])
    {
        $options = array_merge($options, self::$defaultOptions);
        $this->photo = $file;
        $this->chat_id = $chatId;

        foreach ($options as $optionName => $optionValue) {
            if (property_exists($this, $optionName)) {
                $this->{$optionName} = $optionValue;
            }
        }
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
        $result = [];
        $properties = get_object_vars($this);
        unset($properties['methodName']);

        foreach ($properties as $propertyName => $propertyValue) {
            if (!is_null($propertyValue)) {
                $result[] = [
                    'name' => $propertyName,
                    'contents' => $propertyValue,
                ];
            }
        }

        return $result;
    }

    /**
     * @param ClientInterface     $client
     * @param UriInterface|string $url
     *
     * @return ResponseInterface
     *
     * @throws GuzzleException
     */
    public function send(ClientInterface $client, $url): ResponseInterface
    {
        return $client->request('POST', $url, [
            'multipart' => $this->__toArray(),
            'sink' => '/tmp/' . uniqid(),
            'curl' => AbstractMethod::$curl,
        ]);
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
