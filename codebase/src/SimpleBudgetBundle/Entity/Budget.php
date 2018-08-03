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
     * @param float $costAmount
     *
     * @return Budget
     */
    public function setCostAmount(float $costAmount) : Budget
    {
        $this->costAmount = $costAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getCostAmount() : float
    {
        return $this->costAmount;
    }

    /**
     * @param string $costBy
     *
     * @return Budget
     */
    public function setCostBy(string $costBy) : Budget
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
    public function getCostBy() : string
    {
        return $this->costBy;
    }

    /**
     * @param integer $order
     *
     * @return Budget
     */
    public function setOrder(int $order) : Budget
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOrder() : int
    {
        return $this->order;
    }
}