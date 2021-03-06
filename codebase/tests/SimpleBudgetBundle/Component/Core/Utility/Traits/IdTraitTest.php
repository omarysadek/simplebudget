<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Utility\Traits;

use Tests\SimpleBudgetBundle\BaseTestCase;
use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;

class IdTraitTest extends BaseTestCase
{
    const ID = 159;

    protected $magicClass;

    public function setUp()
    {
        $this->magicClass = new class() {
            use IdTrait;

            public function __construct()
            {
                $this->id = IdTraitTest::ID;
            }
        };
    }

    /**
     * @test
     */
    public function getCreatedAt()
    {
        $this->assertEquals(
            IdTraitTest::ID,
            $this->magicClass->getId()
        );
    }
}
