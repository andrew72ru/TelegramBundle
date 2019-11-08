<?php
/**
 * 07.11.2019
 */

declare(strict_types=1);


namespace TelegramBundle\Entities;

/**
 * Class ChatPhoto
 * @see https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto
{
    /**
     * @var string
     */
    private $smallFileId;

    /**
     * @var string
     */
    private $bigFileId;

    /**
     * @return string
     */
    public function getSmallFileId(): string
    {
        return $this->smallFileId;
    }

    /**
     * @param string $smallFileId
     * @return ChatPhoto
     */
    public function setSmallFileId(string $smallFileId): self
    {
        $this->smallFileId = $smallFileId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBigFileId(): string
    {
        return $this->bigFileId;
    }

    /**
     * @param string $bigFileId
     * @return ChatPhoto
     */
    public function setBigFileId(string $bigFileId): self
    {
        $this->bigFileId = $bigFileId;
        return $this;
    }
}
