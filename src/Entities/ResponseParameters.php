<?php
/**
 * 08.11.2019
 */

declare(strict_types=1);


namespace TelegramBundle\Entities;

/**
 * Class ResponseParameters
 * @see https://core.telegram.org/bots/api#responseparameters
 */
class ResponseParameters
{
    /**
     * @var int|null
     */
    private $migrateToChatId;

    /**
     * @var int|null
     */
    private $retryAfter;

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int|null $migrateToChatId
     * @return ResponseParameters
     */
    public function setMigrateToChatId(?int $migrateToChatId): self
    {
        $this->migrateToChatId = $migrateToChatId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }

    /**
     * @param int|null $retryAfter
     * @return ResponseParameters
     */
    public function setRetryAfter(?int $retryAfter): self
    {
        $this->retryAfter = $retryAfter;
        return $this;
    }
}
