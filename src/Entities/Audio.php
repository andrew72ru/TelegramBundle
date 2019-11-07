<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 16:03.
 */

namespace TelegramBundle\Entities;

class Audio
{
    /**
     * @var string
     */
    private $file_id;

    /**
     * @var int
     */
    private $duration;

    /**
     * @var string|null
     */
    private $performer;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $mime_type;
    /**
     * @var int|null
     */
    private $file_size;

    public function __construct(\StdClass $audio)
    {
        foreach (get_object_vars($this) as $objectVar => $value) {
            if ($value) {
                continue;
            }

            if (null !== AbstractEntity::getProperty($audio, $objectVar)) {
                $method = AbstractEntity::formatString($objectVar);
                if (method_exists($this, $method) && property_exists($audio, $objectVar)) {
                    $this->{$method}($audio->{$objectVar});
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @param string $file_id
     *
     * @return Audio
     */
    public function setFileId(string $file_id): Audio
    {
        $this->file_id = $file_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return Audio
     */
    public function setDuration(int $duration): Audio
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     *
     * @return Audio
     */
    public function setPerformer(?string $performer): Audio
    {
        $this->performer = $performer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return Audio
     */
    public function setTitle(?string $title): Audio
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    /**
     * @param string|null $mime_type
     *
     * @return Audio
     */
    public function setMimeType(?string $mime_type): Audio
    {
        $this->mime_type = $mime_type;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * @param int|null $file_size
     *
     * @return Audio
     */
    public function setFileSize(?int $file_size): Audio
    {
        $this->file_size = $file_size;

        return $this;
    }
}
