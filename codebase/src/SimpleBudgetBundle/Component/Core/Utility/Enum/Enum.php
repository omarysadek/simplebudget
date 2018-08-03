<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Enum;

abstract class Enum
{
    protected static $constantsArray = array();

    /**
     * @return array
     */
    public static function getConstants(): array
    {
        $calledClass = get_called_class();

        if (!isset(self::$constantsArray[$calledClass])) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constantsArray[$calledClass] = $reflect->getConstants();
        }

        return self::$constantsArray[$calledClass];
    }

    /**
     * @return array
     */
    public static function getNamesValues(): array
    {
        return self::getConstants();
    }

    /**
     * @return array
     */
    public static function getNames(): array
    {
        return array_keys(self::getConstants());
    }

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return array_values(self::getConstants());
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public static function isValidName(string $name): bool
    {
        if (empty($name)) {
            return false;
        }

        return in_array(strtoupper($name), self::getNames(), true);
    }

    /**
     * @param int|string $value
     * @param bool       $caseSensitive
     *
     * @return bool
     */
    public static function isValidValue($value, $caseSensitive = false): bool
    {
        if (is_null($value)) {
            return false;
        }

        return in_array((is_int($value) ? $value : (!$caseSensitive ? strtolower($value) : $value)), self::getValues(), true);
    }
}
