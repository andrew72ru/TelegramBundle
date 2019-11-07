<?php
declare(strict_types=1);

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
