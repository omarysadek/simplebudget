<?php

namespace SimpleBudgetBundle\Component\Core\Exception;

use SimpleBudgetBundle\Component\Core\Utility\Enum\BaseEnum;

class ExceptionEnum extends BaseEnum
{
    const INVALID_EXCEPTION_CODE = 100001;
    const INVALID_COST_BY_ENUM = 100002;

    /**
     * @param string $message
     * @param int.   $code
     *
     * @throws BadRequestHttpException
     */
    public static function throwInvalidArgumentException(string $message, int $code)
    {
        $code_warding = ' - #';

        if (!static::isValidValue($code)) {
            throw new \InvalidArgumentException('Invalid exception code'.$code_warding.static::INVALID_EXCEPTION_CODE);
        }

        throw new \InvalidArgumentException($message.$code_warding.$code);
    }
}
