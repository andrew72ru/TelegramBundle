<?php
/**
 * User: andrew
 * Date: 29/03/2018
 * Time: 15:56.
 */

namespace TelegramBundle\Entities;

/**
 * Telegram User object.
 *
 * @see https://core.telegram.org/bots/api#user
 */
class User
{
    /**
     * @var int Unique identifier for this user or bot
     */
    private $id;

    /**
     * @var bool True, if this user is a bot
     */
    private $isBot = false;

    /**
     * @var string User‘s or bot’s first name
     */
    private $firstName;

    /**
     * @var string|null Optional. User‘s or bot’s last name
     */
    private $lastName;

    /**
     * @var string|null Optional. User‘s or bot’s username
     */
    private $username;

    /**
     * @var string|null Optional. IETF language tag of the user's language
     *
     * @see https://en.wikipedia.org/wiki/IETF_language_tag
     */
    private $languageCode;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return User
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->isBot;
    }

    /**
     * @param bool $isBot
     *
     * @return User
     */
    public function setIsBot(bool $isBot): self
    {
        $this->isBot = $isBot;

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
     *
     * @return User
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
     *
     * @return User
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return User
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param string|null $languageCode
     *
     * @return User
     */
    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;

        return $this;
    }
}
