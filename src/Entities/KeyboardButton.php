<?php
/**
 * User: andrew
 * Date: 29/05/2018
 * Time: 11:51.
 */
declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class KeyboardButton.
 *
 * @see https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var bool
     */
    private $requestContact = false;

    /**
     * @var bool
     */
    private $requestLocation = false;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return KeyboardButton
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequestContact(): bool
    {
        return $this->requestContact;
    }

    /**
     * @param bool $requestContact
     *
     * @return KeyboardButton
     */
    public function setRequestContact(bool $requestContact): self
    {
        $this->requestContact = $requestContact;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequestLocation(): bool
    {
        return $this->requestLocation;
    }

    /**
     * @param bool $requestLocation
     *
     * @return KeyboardButton
     */
    public function setRequestLocation(bool $requestLocation): self
    {
        $this->requestLocation = $requestLocation;

        return $this;
    }
}
