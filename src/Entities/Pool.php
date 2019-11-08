<?php
/**
 * 07.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class Pool.
 *
 * @see https://core.telegram.org/bots/api#poll
 */
class Pool
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $question;

    /**
     * @var array|PollOption[]
     */
    private $options;

    /**
     * @var bool
     */
    private $isClosed = false;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Pool
     */
    public function setId(string $id): Pool
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     *
     * @return Pool
     */
    public function setQuestion(string $question): Pool
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return array|PollOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array|PollOption[] $options
     *
     * @return Pool
     */
    public function setOptions($options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->isClosed;
    }

    /**
     * @param bool $isClosed
     *
     * @return Pool
     */
    public function setIsClosed(bool $isClosed): Pool
    {
        $this->isClosed = $isClosed;

        return $this;
    }
}
