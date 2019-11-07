<?php
/**
 * User: andrew
 * Date: 31/03/2018
 * Time: 14:56.
 */

namespace TelegramBundle\Methods;

use GuzzleHttp\Exception\GuzzleException;
use TelegramBundle\Interfaces\MethodInterface;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class AbstractMethod.
 */
abstract class AbstractMethod implements MethodInterface
{
    public static $curl = [
        CURLOPT_RESOLVE => ['api.telegram.org:443:149.154.167.220'],
//        CURLOPT_PROXY => 'dplbo.tgvpnproxy.me',
//        CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5,
//        CURLOPT_PROXYUSERPWD => 'telegram:telegram',
//        CURLOPT_PROXYPORT => 1080,
    ];

    protected static $defaultOptions = [
        'parse_mode' => 'Markdown',
    ];

    /**
     * Send message to bot url with parameters with http-client.
     *
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
            'form_params' => $this->__toArray(),
            'sink' => '/tmp/' . uniqid('sink-', true),
            'curl' => self::$curl,
        ]);
    }

    /**
     * @param array $options
     *
     * @return MethodInterface
     */
    protected function setCurlOptions(array $options): MethodInterface
    {
        self::$curl = array_merge(self::$curl, $options);

        return $this;
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
