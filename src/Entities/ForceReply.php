<?php
/**
 * 08.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class ForceReply.
 *
 * @see https://core.telegram.org/bots/api#forcereply
 */
class ForceReply
{
    /**
     * @var bool
     */
    private $forceReply = true;

    /**
     * @var bool
     */
    private $selective = false;

    /**
     * @return bool
     */
    public function isForceReply(): bool
    {
        return $this->forceReply;
    }

    /**
     * @param bool $forceReply
     *
     * @return ForceReply
     */
    public function setForceReply(bool $forceReply): self
    {
        $this->forceReply = $forceReply;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSelective(): bool
    {
        return $this->selective;
    }

    /**
     * @param bool $selective
     *
     * @return ForceReply
     */
    public function setSelective(bool $selective): self
    {
        $this->selective = $selective;

        return $this;
    }
}
