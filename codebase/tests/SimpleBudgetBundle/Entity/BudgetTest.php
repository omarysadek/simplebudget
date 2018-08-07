<?php

namespace Tests\SimpleBudgetBundle\Entity;

use SimpleBudgetBundle\Entity\Budget;
use SimpleBudgetBundle\Entity\Account;
use SimpleBudgetBundle\Entity\Bank;
use SimpleBudgetBundle\Entity\Transfer;
use SimpleBudgetBundle\Component\Budget\Enum\CostByEnum;

class BudgetTest extends EntityBaseTestCase
{
    protected function setUp()
    {
        $this->model = new Budget();
        $this->model->setName(Budget::class);
    }

    /**
     * @test
     */
    public function costAmount()
    {
        $this->setAndGetErTest('costAmount', 1294);
    }

    /**
     * @test
     */
    public function order()
    {
        $this->setAndGetErTest('order', 1294);
    }

    /**
     * @test
     */
    public function costBy()
    {
        $this->enumTest('costBy', CostByEnum::PERCENTAGE);
    }

    /**
     * @test
     */
    public function account()
    {
        $this->setAndGetErTest('account', new Account());
    }

    /**
     * @test
     */
    public function saving()
    {
        $this->booleanTest('saving', true);
    }

    /**
     * @test
     */
    public function bank()
    {
        $this->setAndGetErTest('bank', new Bank());
    }

    /**
     * @test
     */
    public function outTrannsfers()
    {
        $this->collectionsTest('outTrannsfers', new Transfer());
    }

    /**
     * @test
     */
    public function inTrannsfers()
    {
        $this->collectionsTest('inTrannsfers', new Transfer());
    }
}
