<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\NameTrait;
use SimpleBudgetBundle\Component\Budget\Enum\CostByEnum;
use SimpleBudgetBundle\Component\Core\Exception\ExceptionEnum;

/**
 * @ORM\Entity
 * @ORM\Table(name="budget")
 */
class Budget
{
    use IdTrait;
    use NameTrait;

    /**
     * @ORM\Column(name="cost_amount", type="integer")
     */
    protected $costAmount;

    /**
     * @var SimpleBudgetBundle\Component\Core\Utility\Enum\Enum\CostByEnum
     *
     * @ORM\Column(name="cost_by", type="string")
     */
    protected $costBy;

    /**
     * @ORM\Column(type="integer")
     */
    protected $order;

    /**
     * @param integer $costAmount
     *
     * @return Budget
     */
    public function setCostAmount($costAmount)
    {
        $this->costAmount = $costAmount;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCostAmount()
    {
        return $this->costAmount;
    }

    /**
     * @param string $costBy
     *
     * @return Budget
     */
    public function setCostBy($costBy)
    {
        if (!CostByEnum::isValidValue($costBy)) {
            ExceptionEnum::throwBadRequestHttpException('Invalid budget cost_by enum', ExceptionEnum::INVALID_COST_BY_ENUM);
        }
        $this->costBy = $costBy;

        return $this;
    }

    /**
     * @return string
     */
    public function getCostBy()
    {
        return $this->costBy;
    }

    /**
     * @param integer $order
     *
     * @return Budget
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }
}