<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 16:21.
 */

namespace TelegramBundle\Entities;

/**
 * Class Contact
 * @see https://core.telegram.org/bots/api#contact
 */
class Contact
{
    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var int|null
     */
    private $userId;

    /**
     * @var string|null
     */
    private $vcard;

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Contact
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return Contact
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     * @return Contact
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

    /**
     * @param string|null $vcard
     * @return Contact
     */
    public function setVcard(?string $vcard): self
    {
        $this->vcard = $vcard;
        return $this;
    }
}
