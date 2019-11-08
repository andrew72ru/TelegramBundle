<?php
/**
 * 07.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class Venue.
 *
 * @see https://core.telegram.org/bots/api#venue
 */
class Venue
{
    /**
     * @var Location
     */
    private $location;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string|null
     */
    private $foursquareId;

    /**
     * @var string|null
     */
    private $foursquareType;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return Venue
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Venue
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return Venue
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquareId;
    }

    /**
     * @param string|null $foursquareId
     *
     * @return Venue
     */
    public function setFoursquareId(?string $foursquareId): self
    {
        $this->foursquareId = $foursquareId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareType(): ?string
    {
        return $this->foursquareType;
    }

    /**
     * @param string|null $foursquareType
     *
     * @return Venue
     */
    public function setFoursquareType(?string $foursquareType): self
    {
        $this->foursquareType = $foursquareType;

        return $this;
    }
}
