<?php

namespace SimpleBudgetBundle\Component\Core\Exception;

use SimpleBudgetBundle\Component\Core\Utility\Enum\BaseEnum;

class ExceptionEnum extends BaseEnum
{
    const CODE_WARDING = ' - #';
    const INVALID_EXCEPTION_CODE = 100001;
    const INVALID_COST_BY_ENUM = 100002;
    const INVALID_JSON = 100003;
    const BODY_REQUIRED = 100004;

    /**
     * @param string $message
     * @param int    $code
     *
     * @throws InvalidArgumentException
     */
    public static function throwInvalidArgumentException(string $message, int $code)
    {
        self::checkExceptionCode($code);

        throw new \InvalidArgumentException($message.static::CODE_WARDING.$code);
    }

    /**
     * @param string $message
     * @param int    $code
     *
     * @throws throwLogicException
     */
    public static function throwLogicException(string $message, int $code)
    {
        self::checkExceptionCode($code);

        throw new \LogicException($message.static::CODE_WARDING.$code);
    }

    /**
     * @param int $code
     */
    private static function checkExceptionCode(int $code)
    {
        if (!static::isValidValue($code)) {
            throw new \InvalidArgumentException('Invalid exception code'.static::CODE_WARDING.static::INVALID_EXCEPTION_CODE);
        }
    }
}
