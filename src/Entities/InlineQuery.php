<?php
/**
 * User: andrew
 * Date: 03/05/2018
 * Time: 19:24.
 */

namespace TelegramBundle\Entities;

/**
 * Class InlineQuery.
 *
 * @see https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends AbstractEntity
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var User
     */
    private $from;

    /**
     * @var Location|null
     */
    private $location;

    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $offset;

    /**
     * InlineQuery constructor.
     *
     * @param \StdClass $inlineQuery
     */
    public function __construct(\StdClass $inlineQuery)
    {
        foreach (get_object_vars($this) as $objectVar => $value) {
            $method = AbstractEntity::formatString($objectVar);
            if (method_exists($this, $method) && property_exists($inlineQuery, $objectVar)) {
                $this->{$method}($inlineQuery->{$objectVar});
            }
        }
    }

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
     * @return InlineQuery
     */
    public function setId(string $id): self
    {
        $this->id = $id;

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
     * @return InlineQuery
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
     * @return InlineQuery
     */
    public function setLocation(?\StdClass $location): self
    {
        if (!is_null($location)) {
            $this->location = new Location($location);
        }

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
     * @return InlineQuery
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
     * @param string $offset
     *
     * @return InlineQuery
     */
    public function setOffset(string $offset): self
    {
        $this->offset = $offset;

        return $this;
    }
}
