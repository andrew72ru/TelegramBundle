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
class User extends AbstractEntity
{
    /**
     * @var int Unique identifier for this user or bot
     */
    private $id;

    /**
     * @var bool True, if this user is a bot
     */
    private $is_bot = false;

    /**
     * @var string User‘s or bot’s first name
     */
    private $first_name;

    /**
     * @var string|null Optional. User‘s or bot’s last name
     */
    private $last_name;

    /**
     * @var string|null Optional. User‘s or bot’s username
     */
    private $username;

    /**
     * @var string|null Optional. IETF language tag of the user's language
     *
     * @see https://en.wikipedia.org/wiki/IETF_language_tag
     */
    private $language_code;

    /**
     * User constructor.
     *
     * @param \StdClass $user
     */
    public function __construct(\StdClass $user)
    {
        foreach (get_object_vars($this) as $objectVar => $value) {
            $method = AbstractEntity::formatString($objectVar);
            if (method_exists($this, $method) && property_exists($user, $objectVar)) {
                $this->{$method}($user->{$objectVar});
            }
        }
    }

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
        return $this->is_bot;
    }

    /**
     * @param bool $is_bot
     *
     * @return User
     */
    public function setIsBot(bool $is_bot): self
    {
        $this->is_bot = $is_bot;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     *
     * @return User
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     *
     * @return User
     */
    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

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
        return $this->language_code;
    }

    /**
     * @param string|null $language_code
     *
     * @return User
     */
    public function setLanguageCode(?string $language_code): self
    {
        $this->language_code = $language_code;

        return $this;
    }
}
