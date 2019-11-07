<?php
/**
 * User: andrew
 * Date: 30/03/2018
 * Time: 10:38.
 */

namespace TelegramBundle\Entities;

use TelegramBundle\Interfaces\EntityInterface;

/**
 * Class AbstractEntity.
 */
abstract class AbstractEntity implements EntityInterface
{
    /**
     * Format property_name_parameter to setPropertyNameParameter.
     *
     * @param string $string
     *
     * @return string
     */
    public static function formatString(string $string): string
    {
        $pattern = '/(_.)/';
        $replacement = function ($matches) {
            return strtoupper(substr($matches[0], 1));
        };

        return 'set' . ucfirst(preg_replace_callback($pattern, $replacement, $string));
    }

    /**
     * @param object|\StdClass $object
     * @param string           $property
     *
     * @return \StdClass|array|string|null
     */
    public static function getProperty(\StdClass $object, string $property)
    {
        if (!property_exists($object, $property)) {
            return null;
        }

        return $object->{$property};
    }
}
