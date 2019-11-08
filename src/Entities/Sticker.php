<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 16:14.
 */

namespace TelegramBundle\Entities;

/**
 * Class Sticker
 * @see https://core.telegram.org/bots/api#sticker
 */
class Sticker
{
    /**
     * @var string
     */
    private $fileId;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var bool
     */
    private $isAnimated = false;

    /**
     * @var PhotoSize|null
     */
    private $thumb;

    /**
     * @var string|null
     */
    private $emoji;

    /**
     * @var string|null
     */
    private $setName;

    /**
     * @var
     */
    private $maskPosition;

    /**
     * @var int
     */
    private $fileSize;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return Sticker
     */
    public function setFileId(string $fileId): self
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Sticker
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Sticker
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAnimated(): bool
    {
        return $this->isAnimated;
    }

    /**
     * @param bool $isAnimated
     * @return Sticker
     */
    public function setIsAnimated(bool $isAnimated): self
    {
        $this->isAnimated = $isAnimated;
        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize|null $thumb
     * @return Sticker
     */
    public function setThumb(?PhotoSize $thumb): self
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * @param string|null $emoji
     * @return Sticker
     */
    public function setEmoji(?string $emoji): self
    {
        $this->emoji = $emoji;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSetName(): ?string
    {
        return $this->setName;
    }

    /**
     * @param string|null $setName
     * @return Sticker
     */
    public function setSetName(?string $setName): self
    {
        $this->setName = $setName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaskPosition()
    {
        return $this->maskPosition;
    }

    /**
     * @param mixed $maskPosition
     * @return Sticker
     */
    public function setMaskPosition($maskPosition)
    {
        $this->maskPosition = $maskPosition;
        return $this;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     * @return Sticker
     */
    public function setFileSize(int $fileSize): self
    {
        $this->fileSize = $fileSize;
        return $this;
    }
}
