<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Utility\Traits;

use Tests\SimpleBudgetBundle\UtilityTestCase;
use SimpleBudgetBundle\Component\Core\Utility\Traits\NameTrait;

class NameTraitTest extends UtilityTestCase
{
    const NAME = 'MrMasterOfNone';

    protected $magicClass;

    public function setUp()
    {
        $this->magicClass = new class() {
            use NameTrait;

            public function __construct()
            {
                $this->setName(NameTraitTest::NAME);
            }
        };
    }

    /**
     * @test
     */
    public function getCreatedAt()
    {
        $this->assertEquals(
            NameTraitTest::NAME,
            $this->magicClass->getName()
        );
    }
}
