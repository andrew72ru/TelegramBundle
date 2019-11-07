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

}
