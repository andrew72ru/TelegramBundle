<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 14:06.
 */

namespace TelegramBundle\Exceptions;

use Throwable;

/**
 * Class TelegramException
 * Simple exception for telegram sender.
 */
class TelegramException extends \Exception
{
    public function __construct(string $message = '', int $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
