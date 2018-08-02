<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Enum;

abstract class Enum
{
    protected static $constantsArray = array();

    /**
     * @return array
     */
    public static function getConstants()
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
    public static function getNamesValues()
    {
        return self::getConstants();
    }

    /**
     * @return array
     */
    public static function getNames()
    {
        return array_keys(self::getConstants());
    }

    /**
     * @return array
     */
    public static function getValues()
    {
        return array_values(self::getConstants());
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public static function isValidName($name)
    {
        if (empty($name)) {

            return false;
        }

        return in_array(strtoupper($name), self::getNames(), true);
    }

    /**
     * @param int|string $value
     * @param boolean $caseSensitive
     *
     * @return bool
     */
    public static function isValidValue($value, $caseSensitive = false)
    {
        if (is_null($value)) {

            return false;
        }

        return in_array((is_int($value) ? $value : (!$caseSensitive ? strtolower($value) : $value)), self::getValues(), true);
    }
}