<?php
/**
 * 08.11.2019.
 */

declare(strict_types=1);

namespace TelegramBundle\Entities;

/**
 * Class PollOption.
 *
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $voterCount;

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
     * @return PollOption
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return int
     */
    public function getVoterCount(): int
    {
        return $this->voterCount;
    }

    /**
     * @param int $voterCount
     *
     * @return PollOption
     */
    public function setVoterCount(int $voterCount): self
    {
        $this->voterCount = $voterCount;

        return $this;
    }
}
