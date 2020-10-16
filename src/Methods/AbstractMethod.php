<?php
/**
 * User: andrew
 * Date: 31/03/2018
 * Time: 14:56.
 */

namespace TelegramBundle\Methods;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use TelegramBundle\Interfaces\MethodInterface;
use TelegramBundle\Interfaces\SendMessageInterface;

/**
 * Class AbstractMethod.
 */
abstract class AbstractMethod implements MethodInterface
{
    public const PARSE_MODE_MD = 'Markdown';
    public const PARSE_MODE_HTML = 'HTML';

    protected static $defaultOptions = [
        'parse_mode' => self::PARSE_MODE_HTML,
    ];

    /**
     * Send message to bot url with parameters with http-client.
     *
     * @param SendMessageInterface $service
     * @param array                $options
     *
     * @return ResponseInterface
     *
     * @throws TransportExceptionInterface
     */
    public function send(SendMessageInterface $service, $options = []): ResponseInterface
    {
        return $service->getResponse($this, \array_merge([
            'json' => $this->__toArray(),
        ], $options));
    }

    /**
     * @param array $options
     *
     * @return MethodInterface
     */
    public function setOptions(array $options): MethodInterface
    {
        foreach ($options as $optionName => $optionValue) {
            if (property_exists($this, $optionName)) {
                $class = static::class;
                try {
                    $property = (new \ReflectionClass($class))->getProperty($optionName);
                } catch (\ReflectionException $e) {
                    throw new \RuntimeException($e->getMessage(), (int) $e->getCode());
                }
                $property->setAccessible(true);
                $property->setValue($this, $optionValue);
            }
        }

        return $this;
    }
}
