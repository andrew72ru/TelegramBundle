<?php

declare(strict_types=1);

namespace TelegramBundle\Events;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\EventDispatcher\Event;
use TelegramBundle\Entities\Update;
use TelegramBundle\Interfaces\SendMessageInterface;
use TelegramBundle\Interfaces\TelegramEventInterface;

/**
 * Class AbstractEvent.
 */
abstract class AbstractEvent extends Event implements TelegramEventInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Update
     */
    protected $update;

    /**
     * @var SendMessageInterface
     */
    protected $sendMessageService;

    /**
     * AbstractEvent constructor.
     *
     * @param Request              $request
     * @param Update               $update
     * @param SendMessageInterface $sendMessageService
     */
    public function __construct(Request $request, Update $update, SendMessageInterface $sendMessageService)
    {
        $this->request = $request;
        $this->update = $update;
        $this->sendMessageService = $sendMessageService;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Update
     */
    public function getUpdate(): Update
    {
        return $this->update;
    }

    /**
     * @return SendMessageInterface
     */
    public function getService(): SendMessageInterface
    {
        return $this->sendMessageService;
    }
}
