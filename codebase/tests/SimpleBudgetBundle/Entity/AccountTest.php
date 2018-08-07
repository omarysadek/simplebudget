<?php

namespace Tests\SimpleBudgetBundle\Entity;

use SimpleBudgetBundle\Entity\Account;
use SimpleBudgetBundle\Entity\Client;
use SimpleBudgetBundle\Entity\Budget;
use SimpleBudgetBundle\Entity\Bank;

class AccountTest extends EntityBaseTestCase
{
    protected function setUp()
    {
        $this->model = new Account();
        $this->model->setName(Account::class);
    }

    /**
     * @test
     */
    public function editable()
    {
        $this->booleanTest('editable', true);
    }

    /**
     * @test
     */
    public function total()
    {
        $this->setAndGetErTest('total', 1294);
    }

    /**
     * @test
     */
    public function order()
    {
        $this->setAndGetErTest('order', 1);
    }

    /**
     * @test
     */
    public function belongsTo()
    {
        $this->setAndGetErTest('belongsTo', new Client());
    }

    /**
     * @test
     */
    public function budgets()
    {
        $this->collectionsTest('budgets', new Budget());
    }

    /**
     * @test
     */
    public function limit()
    {
        $this->setAndGetErTest('limit', 1);
    }

    /**
     * @test
     */
    public function income()
    {
        $this->booleanTest('income', true);
    }

    /**
     * @test
     */
    public function bank()
    {
        $this->setAndGetErTest('bank', new Bank());
    }
}
