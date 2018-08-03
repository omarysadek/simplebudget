<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\NameTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\CreatedAtTrait;
use SimpleBudgetBundle\Component\Core\Exception\ExceptionEnum;
use SimpleBudgetBundle\Component\Income\Enum\TypeEnum;

/**
 * @ORM\Entity
 * @ORM\Table(name="income")
 */
class Income
{
    use IdTrait;
    use NameTrait;
    use CreatedAtTrait;

    /**
     * @ORM\Column(type="integer")
     */
    protected $amount;

    /**
     * @ORM\Column(type="integer")
     */
    protected $frequency;

    /**
     * @var SimpleBudgetBundle\Component\Income\Enum\TypeEnum
     *
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @param float $amount
     *
     * @return Income
     */
    public function setAmount(float $amount) : Income
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount() : float
    {
        return $this->amount;
    }
    /**
     * @param integer $frequency
     *
     * @return Income
     */
    public function setFrequency(int $frequency) : Income
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFrequency() : int
    {
        return $this->frequency;
    }
    /**
     * @param string $type
     *
     *. @return Income
     */
    public function setType(string $type) : Income
    {
        if (!TypeEnum::isValidValue($type)) {
            ExceptionEnum::throwBadRequestHttpException('Invalid income type enum', ExceptionEnum::INVALID_COST_BY_ENUM);
        }
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
}
