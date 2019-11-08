<?php
/**
 * User: andrew
 * Date: 28/05/2018
 * Time: 14:22.
 */

namespace TelegramBundle\Events;

use TelegramBundle\Interfaces\MethodInterface;
use TelegramBundle\Methods\AbstractMethod;
use TelegramBundle\Methods\SendMessage;

class CommandEvent extends AbstractEvent
{
    public const NAME = 'telegram.command';

    /**
     * Make object for send as answer.
     *
     * @return MethodInterface|AbstractMethod
     */
    public function getMethod(): MethodInterface
    {
        return new SendMessage((string) $this->update->getUpdateId());
    }
}
