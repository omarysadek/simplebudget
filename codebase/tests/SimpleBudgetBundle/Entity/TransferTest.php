<?php

namespace Tests\SimpleBudgetBundle\Entity;

use SimpleBudgetBundle\Entity\Transfer;
use SimpleBudgetBundle\Entity\Budget;
use SimpleBudgetBundle\Entity\Client;

class TransferTest extends EntityBaseTestCase
{
    protected function setUp()
    {
        $this->model = new Transfer();
        $this->model->setId(time());
    }

    /**
     * @test
     */
    public function scheduleAt()
    {
        $this->setAndGetErTest('scheduleAt', \DateTime::createFromFormat('Y-m-d H:i:s', '2017-08-31 00:00:00'));
    }

    /**
     * @test
     */
    public function budgetFrom()
    {
        $this->setAndGetErTest('budgetFrom', new Budget());
    }

    /**
     * @test
     */
    public function budgetTo()
    {
        $this->setAndGetErTest('budgetTo', new Budget());
    }

    /**
     * @test
     */
    public function client()
    {
        $this->setAndGetErTest('client', new Client());
    }

    /**
     * @test
     */
    public function comment()
    {
        $this->setAndGetErTest('comment', 'comment');
    }
}
