<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 18:03.
 */

namespace TelegramBundle\Interfaces;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

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
     * Send message to bot url with parameters with http-client throws Send Message Service.
     *
     * @param SendMessageInterface $service
     * @param array                $options
     *
     * @return ResponseInterface
     *
     * @throws TransportExceptionInterface
     */
    public function send(SendMessageInterface $service, array $options = []): ResponseInterface;

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
