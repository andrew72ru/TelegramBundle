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
    private $resultId;

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
    private $inlineMessageId;

    /**
     * @var string
     */
    private $query;


}
