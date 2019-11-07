<?php
/**
 * User: andrew
 * Date: 28/05/2018
 * Time: 18:49.
 */

namespace TelegramBundle\Events;

use TelegramBundle\Interfaces\MethodInterface;
use TelegramBundle\Methods\AbstractMethod;
use TelegramBundle\Methods\SendMessage;

/**
 * Class CallbackQueryEvent
 * Fire if Update contains the getCallbackQuery item.
 */
class CallbackQueryEvent extends AbstractEvent
{
    public const NAME = 'telegram.callback_query';

    /**
     * Make object for send as answer.
     *
     * @return MethodInterface|AbstractMethod
     */
    public function getMethod(): MethodInterface
    {
        $method = new SendMessage($this->update->getChatId());
        $this->update->setAnswer($method);

        return $method;
    }
}
