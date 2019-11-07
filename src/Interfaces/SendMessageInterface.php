<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 13:57.
 */

declare(strict_types=1);

namespace TelegramBundle\Interfaces;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\UriInterface;

/**
 * Interface SendMessageInterface.
 */
interface SendMessageInterface
{
    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface;

    /**
     * @param string $method
     *
     * @return UriInterface
     */
    public function getApiUrl(string $method): UriInterface;
}
