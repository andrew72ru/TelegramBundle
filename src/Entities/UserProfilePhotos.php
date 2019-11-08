<?php
/**
 * 08.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class UserProfilePhotos.
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos
{
    /**
     * @var int
     */
    private $totalCount;

    /**
     * @var array|PhotoSize[]
     */
    private $photos;

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     *
     * @return UserProfilePhotos
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * @return array|PhotoSize[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * @param array|PhotoSize[] $photos
     *
     * @return UserProfilePhotos
     */
    public function setPhotos($photos): self
    {
        $this->photos = $photos;

        return $this;
    }
}
