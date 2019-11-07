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
class KeyboardButton extends AbstractEntity
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var bool
     */
    private $request_contact = false;

    /**
     * @var bool
     */
    private $request_location = false;

    /**
     * @return string|null
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
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
        return $this->request_contact;
    }

    /**
     * @param bool $request_contact
     *
     * @return KeyboardButton
     */
    public function setRequestContact(bool $request_contact): self
    {
        $this->request_contact = $request_contact;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequestLocation(): bool
    {
        return $this->request_location;
    }

    /**
     * @param bool $request_location
     *
     * @return KeyboardButton
     */
    public function setRequestLocation(bool $request_location): self
    {
        $this->request_location = $request_location;

        return $this;
    }

    public function __invoke(): array
    {
        $result = [
            'text' => $this->getText(),
        ];

        if ($this->isRequestContact()) {
            $result['request_contact'] = $this->isRequestContact();
        }

        if ($this->isRequestLocation()) {
            $result['request_location'] = $this->isRequestLocation();
        }

        return $result;
    }
}
