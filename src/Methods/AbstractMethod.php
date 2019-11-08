<?php
/**
 * User: andrew
 * Date: 31/03/2018
 * Time: 14:56.
 */

namespace TelegramBundle\Methods;

use Psr\Http\Message\UriInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use TelegramBundle\Interfaces\MethodInterface;

/**
 * Class AbstractMethod.
 */
abstract class AbstractMethod implements MethodInterface
{
    protected static $defaultOptions = [
        'parse_mode' => 'HTML',
    ];

    /**
     * Send message to bot url with parameters with http-client.
     *
     * @param HttpClientInterface $client
     * @param UriInterface|string $url
     * @param array               $options
     *
     * @return ResponseInterface
     *
     * @throws TransportExceptionInterface
     */
    public function send(HttpClientInterface $client, $url, $options = []): ResponseInterface
    {
        $url = \sprintf('%s/%s', $url, $this->getMethodName());

        return $client->request('POST', $url, [
            'form_params' => $this->__toArray(),
            'resolve' => ['api.telegram.org' => '443:149.154.167.220'],
        ]);
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
