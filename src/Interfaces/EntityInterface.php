<?php
/**
 * User: andrew
 * Date: 30/03/2018
 * Time: 09:46.
 */

namespace TelegramBundle\Interfaces;

interface EntityInterface
{
    /**
     * @param object|\StdClass $object
     * @param string           $property
     *
     * @return \StdClass|array|string|null
     */
    public static function getProperty(\StdClass $object, string $property);
}
