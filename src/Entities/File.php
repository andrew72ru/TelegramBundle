<?php
/**
 * 08.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class File.
 *
 * @see https://core.telegram.org/bots/api#file
 */
class File
{
    /**
     * @var string
     */
    private $fileId;

    /**
     * @var int|null
     */
    private $fileSize;

    /**
     * @var string|null
     */
    private $filePath;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     *
     * @return File
     */
    public function setFileId(string $fileId): self
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @param int|null $fileSize
     *
     * @return File
     */
    public function setFileSize(?int $fileSize): self
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    /**
     * @param string|null $filePath
     *
     * @return File
     */
    public function setFilePath(?string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }
}
