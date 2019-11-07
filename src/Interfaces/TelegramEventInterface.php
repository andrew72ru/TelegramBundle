<?php
/**
 * User: andrew
 * Date: 28/05/2018
 * Time: 14:15.
 */

namespace TelegramBundle\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use TelegramBundle\Entities\Update;
use TelegramBundle\Exceptions\TelegramException;
use TelegramBundle\Methods\AbstractMethod;
use TelegramBundle\SendMessageService;

/**
 * Interface TelegramEventInterface.
 */
interface TelegramEventInterface
{
    /**
     * @return Request
     */
    public function getRequest(): Request;

    /**
     * @return Update
     */
    public function getUpdate(): Update;

    /**
     * @return SendMessageService
     */
    public function getService(): SendMessageService;

    /**
     * Make object for send as answer.
     *
     * @return MethodInterface|AbstractMethod
     *
     * @throws TelegramException
     */
    public function getMethod(): MethodInterface;
}
