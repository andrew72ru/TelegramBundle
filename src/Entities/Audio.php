<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 16:03.
 */

namespace TelegramBundle\Entities;

/**
 * Class Audio.
 * @see https://core.telegram.org/bots/api#audio
 */
class Audio extends Document
{
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
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return Audio
     */
    public function setDuration(int $duration): self
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
     * @return Audio
     */
    public function setPerformer(?string $performer): self
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
     * @return Audio
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }
}
