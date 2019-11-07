<?php

declare(strict_types=1);

namespace TelegramBundle\Interfaces;

use Symfony\Contracts\HttpClient\HttpClientInterface;

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
    public function getApiUrl(string $method): string;
}
