<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Utility\Traits;

use Tests\SimpleBudgetBundle\UtilityTestCase;
use SimpleBudgetBundle\Component\Core\Utility\Traits\UpdatedAtTrait;

class UpdatedAtTraitTest extends UtilityTestCase
{
    const UPDATED_AT = '08/01/2018';

    protected $magicClass;

    public function setUp()
    {
        $this->magicClass = new class() {
            use UpdatedAtTrait;
        };
    }

    /**
     * @test
     */
    public function getCreatedAt()
    {
        $this->magicClass->setUpdatedAt(new \DateTime(UpdatedAtTraitTest::UPDATED_AT));

        $this->assertEquals(
            new \DateTime(UpdatedAtTraitTest::UPDATED_AT),
            $this->magicClass->getUpdatedAt()
        );
    }
}
