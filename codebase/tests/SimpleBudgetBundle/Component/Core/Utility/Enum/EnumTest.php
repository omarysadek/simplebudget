<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Utility\Enum;

use Tests\SimpleBudgetBundle\UtilityTestCase;
use SimpleBudgetBundle\Component\Core\Utility\Enum\Enum;

class EnumTest extends UtilityTestCase
{
    const VEGETA_KEY = 'VEGETA';
    const VEGETA_VALUE = 'weak';
    const SUNGOKU_KEY = 'SUNGOKU';
    const SUNGOKU_VALUE = 'hype';

    protected $dragonballzEnum;

    public function setUp()
    {
        $this->dragonballzEnum = new class() extends Enum {
            const VEGETA = EnumTest::VEGETA_VALUE;
            const SUNGOKU = EnumTest::SUNGOKU_VALUE;
        };
    }

    /**
     * @test
     */
    public function getConstants()
    {
        $this->assertEquals(
            [
                self::VEGETA_KEY => $this->dragonballzEnum::VEGETA,
                self::SUNGOKU_KEY => $this->dragonballzEnum::SUNGOKU,
            ],
            $this->dragonballzEnum->getConstants()
        );
    }

    /**
     * @test
     */
    public function getNamesValues()
    {
        $this->assertEquals(
            [
                self::VEGETA_KEY => $this->dragonballzEnum::VEGETA,
                self::SUNGOKU_KEY => $this->dragonballzEnum::SUNGOKU,
            ],
            $this->dragonballzEnum->getNamesValues()
        );
    }

    /**
     * @test
     */
    public function getNames()
    {
        $this->assertEquals(
            [
                self::VEGETA_KEY,
                self::SUNGOKU_KEY,
            ],
            $this->dragonballzEnum->getNames()
        );
    }

    /**
     * @test
     */
    public function getValues()
    {
        $this->assertEquals(
            [
                $this->dragonballzEnum::VEGETA,
                $this->dragonballzEnum::SUNGOKU,
            ],
            $this->dragonballzEnum->getValues()
        );
    }

    /**
     * @test
     * @dataProvider isValidNameProvider
     */
    public function isValidName($enumName, $expectedResult)
    {
        $this->assertEquals(
            $expectedResult,
            $this->dragonballzEnum->isValidName($enumName)
        );
    }

    public function isValidNameProvider()
    {
        return [
            [
                'enumName' => self::VEGETA_KEY,
                'expectedResult' => true,
            ],
            [
                'enumName' => 'Me',
                'expectedResult' => false,
            ],
            [
                'enumName' => '',
                'expectedResult' => false,
            ],
        ];
    }

    /**
     * @test
     * @dataProvider isValidValueProvider
     */
    public function isValidValue($enumName, $expectedResult)
    {
        $this->assertEquals(
            $expectedResult,
            $this->dragonballzEnum->isValidValue($enumName)
        );
    }

    public function isValidValueProvider()
    {
        return [
            [
                'enumName' => self::VEGETA_VALUE,
                'expectedResult' => true,
            ],
            [
                'enumName' => 'meh',
                'expectedResult' => false,
            ],
            [
                'enumName' => null,
                'expectedResult' => false,
            ],
        ];
    }
}
