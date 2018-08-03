<?php

namespace Tests\SimpleBudgetBundle\Component\Core\Utility\Traits;

use Tests\SimpleBudgetBundle\UtilityTestCase;
use SimpleBudgetBundle\Component\Core\Utility\Traits\UpdatedByTrait;
use SimpleBudgetBundle\Entity\User;

class UpdatedByTraitTest extends UtilityTestCase
{
    const USER_ID = 148;

    protected $magicClass;

    public function setUp()
    {
        $this->magicClass = new class() {
            use UpdatedByTrait;

            public function __construct()
            {
                $user = new User();
                $user->setId(CreatedByTraitTest::USER_ID);

                $this->setUpdatedBy($user);
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
            $this->magicClass->getUpdatedBy()->getId()
        );
    }
}
