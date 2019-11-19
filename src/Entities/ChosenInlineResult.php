<?php
/**
 * User: andrew
 * Date: 04/05/2018
 * Time: 08:54.
 */

namespace TelegramBundle\Entities;

/**
 * Class ChosenInlineResult.
 *
 * @see https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult
{
    /**
     * @var string
     */
    private $resultId;

    /**
     * @var TelegramUser
     */
    private $from;

    /**
     * @var Location|null
     */
    private $location;

    /**
     * @var string|null
     */
    private $inlineMessageId;

    /**
     * @var string
     */
    private $query;

    /**
     * @return string
     */
    public function getResultId(): string
    {
        return $this->resultId;
    }

    /**
     * @param string $resultId
     *
     * @return ChosenInlineResult
     */
    public function setResultId(string $resultId): self
    {
        $this->resultId = $resultId;

        return $this;
    }

    /**
     * @return TelegramUser
     */
    public function getFrom(): TelegramUser
    {
        return $this->from;
    }

    /**
     * @param TelegramUser $from
     *
     * @return ChosenInlineResult
     */
    public function setFrom(TelegramUser $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @return ChosenInlineResult
     */
    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string|null $inlineMessageId
     *
     * @return ChosenInlineResult
     */
    public function setInlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return ChosenInlineResult
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }
}
