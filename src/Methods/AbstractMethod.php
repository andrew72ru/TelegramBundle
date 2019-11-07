<?php
/**
 * User: andrew
 * Date: 31/03/2018
 * Time: 14:56.
 */

namespace TelegramBundle\Methods;

use GuzzleHttp\Exception\GuzzleException;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use TelegramBundle\Interfaces\MethodInterface;
use GuzzleHttp\ClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class AbstractMethod.
 */
abstract class AbstractMethod implements MethodInterface
{
//    public static $curl = [
//        CURLOPT_RESOLVE => ['api.telegram.org:443:149.154.167.220'],
//    ];

    protected static $defaultOptions = [
        'parse_mode' => 'Markdown',
    ];

    /**
     * Send message to bot url with parameters with http-client.
     *
     * @param HttpClientInterface     $client
     * @param UriInterface|string $url
     *
     * @return ResponseInterface
     */
    public function send(HttpClientInterface $client, $url): ResponseInterface
    {
        // TODO Refactor
//        return $client->request('POST', $url, [
//            'form_params' => $this->__toArray(),
//            'sink' => '/tmp/' . uniqid('sink-', true),
//            'curl' => self::$curl,
//        ]);
    }

    /**
     * @param array $options
     *
     * @return SendMessage
     */
    public function setOptions(array $options): MethodInterface
    {
        foreach ($options as $optionName => $optionValue) {
            if (property_exists($this, $optionName)) {
                $class = static::class;
                try {
                    $property = (new \ReflectionClass($class))->getProperty($optionName);
                } catch (\ReflectionException $e) {
                    throw new \RuntimeException($e->getMessage(), $e->getCode());
                }
                $property->setAccessible(true);
                $property->setValue($this, $optionValue);
            }
        }

        return $this;
    }
}
