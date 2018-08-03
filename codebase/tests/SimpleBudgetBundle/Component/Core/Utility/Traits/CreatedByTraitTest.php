<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Utility\Traits;

use Tests\SimpleBudgetBundle\UtilityTestCase;
use SimpleBudgetBundle\Component\Core\Utility\Traits\CreatedByTrait;
use SimpleBudgetBundle\Entity\User;

class CreatedByTraitTest extends UtilityTestCase
{
    const USER_ID = 148;

    protected $magicClass;

    public function setUp()
    {
        $this->magicClass = new class() {
            use CreatedByTrait;

            public function __construct()
            {
                $user = new User();
                $user->setId(CreatedByTraitTest::USER_ID);

                $this->setCreatedBy($user);
            }
        };
    }

    /**
     * @test
     */
    public function getCreatedBy()
    {
        $this->assertEquals(
            self::USER_ID,
            $this->magicClass->getCreatedBy()->getId()
        );
    }
}
