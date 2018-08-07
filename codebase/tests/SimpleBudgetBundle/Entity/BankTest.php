<?php

namespace Tests\SimpleBudgetBundle\Entity;

use SimpleBudgetBundle\Entity\Bank;

class BankTest extends EntityBaseTestCase
{
    protected function setUp()
    {
        $this->model = new Bank();
        $this->model->setName(Bank::class);
    }

    /**
     * @test
     */
    public function total()
    {
        $this->setAndGetErTest('total', 1294);
    }
}
