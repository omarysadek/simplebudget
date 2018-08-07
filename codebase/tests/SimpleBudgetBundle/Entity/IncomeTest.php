<?php

namespace Tests\SimpleBudgetBundle\Entity;

use SimpleBudgetBundle\Entity\Income;
use SimpleBudgetBundle\Entity\Budget;
use SimpleBudgetBundle\Component\Income\Enum\TypeEnum;

class IncomeTest extends EntityBaseTestCase
{
    protected function setUp()
    {
        $this->model = new Income();
        $this->model->setName(Income::class);
    }

    /**
     * @test
     */
    public function amount()
    {
        $this->setAndGetErTest('amount', 1294);
    }

    /**
     * @test
     */
    public function frequency()
    {
        $this->setAndGetErTest('frequency', 1294);
    }

    /**
     * @test
     */
    public function type()
    {
        $this->enumTest('type', TypeEnum::SALARY);
    }

    /**
     * @test
     */
    public function budget()
    {
        $this->setAndGetErTest('budget', new Budget());
    }
}
