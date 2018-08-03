<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Exception;

use PHPUnit\Framework\TestCase;

use SimpleBudgetBundle\Component\Core\Exception\ExceptionEnum;

class ExceptionEnumTest extends TestCase
{
    /**
     * @test
     * @dataProvider throwInvalidArgumentExceptionProvider
     */
    public function throwInvalidArgumentException($message, $code, $exceptionName)
    {
        $this->expectException($exceptionName);
        $this->expectExceptionMessage($message . ' - #' . $code);

        ExceptionEnum::throwInvalidArgumentException($message, $code);
    }

    public function throwInvalidArgumentExceptionProvider()
    {
        return [
            [
                'message'   => 'error message',
                'code'      => ExceptionEnum::INVALID_EXCEPTION_CODE,
                'exceptionName' => \InvalidArgumentException::class
            ]
        ];
    }
}

