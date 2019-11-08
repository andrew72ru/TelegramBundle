<?php

declare(strict_types=1);

namespace TelegramBundle\Interfaces;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use TelegramBundle\Entities\Update;

/**
 * Interface SendMessageInterface.
 */
interface SendMessageInterface
{
    /**
     * @return HttpClientInterface
     */
    public function getClient(): HttpClientInterface;

    /**
     * @param string $method
     *
     * @return string
     */
    public function getApiUrl(): string;

    /**
     * @param MethodInterface $method
     * @param Update          $update
     * @param array           $options
     *
     * @return ResponseInterface
     */
    public function getResponse(MethodInterface $method, Update $update, array $options = []): ResponseInterface;
}
