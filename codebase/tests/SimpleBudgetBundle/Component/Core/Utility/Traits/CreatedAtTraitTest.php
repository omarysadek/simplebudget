<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Utility\Traits;

use Tests\SimpleBudgetBundle\UtilityTestCase;
use SimpleBudgetBundle\Component\Core\Utility\Traits\CreatedAtTrait;

class CreatedAtTraitTest extends UtilityTestCase
{
    const CREATED_AT = '08/01/2018';

    protected $magicClass;

    public function setUp()
    {
        $this->magicClass = new class() {
            use CreatedAtTrait;
        };
    }

    /**
     * @test
     */
    public function getCreatedAt()
    {
        $this->magicClass->setCreatedAt(new \DateTime(CreatedAtTraitTest::CREATED_AT));

        $this->assertEquals(
            new \DateTime(CreatedAtTraitTest::CREATED_AT),
            $this->magicClass->getCreatedAt()
        );
    }
}
