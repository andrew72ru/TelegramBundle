<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 18:03.
 */

namespace TelegramBundle\Interfaces;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Interface MethodInterface
 * Interface for Telegram methods.
 */
interface MethodInterface
{
    /**
     * Telegram method name.
     *
     * @return string
     */
    public function getMethodName(): string;

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
    public function send(ClientInterface $client, $url): ResponseInterface;

    /**
     * Return array with Telegram method parameters as keys and parameters keys as values.
     *
     * @see https://core.telegram.org/bots/api#available-methods
     *
     * @return array
     */
    public function __toArray(): array;

    /**
     * Set class properties.
     *
     * @param array $options
     *
     * @return MethodInterface
     */
    public function setOptions(array $options): self;
}
