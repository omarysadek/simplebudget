<?php

namespace SimpleBudgetBundle\Component\Core\Exception;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

use SimpleBudgetBundle\Component\Core\Utility\Enum\Enum;

class ExceptionEnum extends Enum
{
    const INVALID_EXCEPTION_CODE = 100001;
    const INVALID_COST_BY_ENUM   = 100002;
    /**
     * @param string $message
     * @param int $code
     *
     * @throws BadRequestHttpException
     */
    public static function throwBadRequestHttpException($message, $code)
    {
        $code_warding = ' - #';

        if (!static::isValidValue($code)) {
            throw new BadRequestHttpException('Invalid exception code' . $code_warding, null, static::INVALID_EXCEPTION_CODE);
        }

        throw new BadRequestHttpException($message . $code_warding, null, $code);
    }
}