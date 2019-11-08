<?php
/**
 * 07.11.2019
 */

declare(strict_types=1);


namespace TelegramBundle\Entities;

/**
 * Class Animation.
 * @see https://core.telegram.org/bots/api#animation
 */
class Animation extends BaseVideo
{
    /**
     * @var string|null
     */
    private $fileName;

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     * @return Animation
     */
    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;
        return $this;
    }
}
