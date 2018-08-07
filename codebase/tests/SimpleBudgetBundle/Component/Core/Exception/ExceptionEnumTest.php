<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Exception;

use Tests\SimpleBudgetBundle\BaseTestCase;
use SimpleBudgetBundle\Component\Core\Exception\ExceptionEnum;

class ExceptionEnumTest extends BaseTestCase
{
    /**
     * @test
     */
    public function errorThrowInvalidArgumentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid exception code - #'.ExceptionEnum::INVALID_EXCEPTION_CODE);

        ExceptionEnum::throwInvalidArgumentException('', 0);
    }

    /**
     * @test
     * @dataProvider throwInvalidArgumentExceptionProvider
     */
    public function throwInvalidArgumentException($message, $code, $exceptionName)
    {
        $this->expectException($exceptionName);
        $this->expectExceptionMessage($message.' - #'.$code);

        ExceptionEnum::throwInvalidArgumentException($message, $code);
    }

    public function throwInvalidArgumentExceptionProvider()
    {
        return [
            [
                'message' => 'error message',
                'code' => ExceptionEnum::INVALID_EXCEPTION_CODE,
                'exceptionName' => \InvalidArgumentException::class,
            ],
        ];
    }
}
