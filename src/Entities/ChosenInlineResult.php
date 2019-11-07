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
class ChosenInlineResult extends AbstractEntity
{
    /**
     * @var string
     */
    private $result_id;

    /**
     * @var User
     */
    private $from;

    /**
     * @var Location|null
     */
    private $location;

    /**
     * @var string|null
     */
    private $inline_message_id;

    /**
     * @var string
     */
    private $query;

    /**
     * ChosenInlineResult constructor.
     *
     * @param \StdClass $inlineResult
     */
    public function __construct(\StdClass $inlineResult)
    {
        foreach (get_object_vars($this) as $objectVar => $value) {
            $method = AbstractEntity::formatString($objectVar);
            if (method_exists($this, $method) && property_exists($inlineResult, $objectVar)) {
                $this->{$method}($inlineResult->{$objectVar});
            }
        }
    }

    /**
     * @return string
     */
    public function getResultId(): string
    {
        return $this->result_id;
    }

    /**
     * @param string $result_id
     *
     * @return ChosenInlineResult
     */
    public function setResultId(string $result_id): self
    {
        $this->result_id = $result_id;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param \StdClass $from
     *
     * @return ChosenInlineResult
     */
    public function setFrom(\StdClass $from): self
    {
        $this->from = new User($from);

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
     * @param \StdClass|null $location
     *
     * @return ChosenInlineResult
     */
    public function setLocation(?\StdClass $location): self
    {
        if (!is_null($location)) {
            $this->location = new Location($location);
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * @param string|null $inline_message_id
     *
     * @return ChosenInlineResult
     */
    public function setInlineMessageId(?string $inline_message_id): self
    {
        $this->inline_message_id = $inline_message_id;

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
