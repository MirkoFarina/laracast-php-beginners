<?php
namespace Core;
class Validator
{
    /**
     * Value must have minimun 1 characater
     */
    public static function required(string $value)
    {
        return !!(!strlen(trim($value)));
    }

    /**
     * Check the minimum of characters of value
     */
    public static function min(string $value, int $min = 1)
    {
        return strlen(trim($value)) <= $min ;
    }
    /**
     * Check the maximum of characters of value
     */
    public static function max(string $value, int $max = INF)
    {
        return strlen(trim($value)) >= $max ;
    }

    /**
     * Check if the $value is correct email
     */
    public static function email(string $value)
    {
        return filter_var(trim($value), FILTER_VALIDATE_EMAIL);
    }


    public static function string(string $value, int $min = 1, int $max = INF)
    {
        $value = trim($value);
        return strlen($value) <= $min && strlen($value) >= $max;
    }

    /**
     * Check if the $value is correct URL
     */
    public static function url(string $value)
    {
        return filter_var(trim($value), FILTER_VALIDATE_URL);
    }
}
