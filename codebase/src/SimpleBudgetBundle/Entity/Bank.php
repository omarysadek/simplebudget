<?php

namespace SimpleBudgetBundle\Entity;

use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;
use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\NameTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="bank")
 */
class Bank
{
    use IdTrait;
    use NameTrait;

    /**
     * The total amount of available money.
     *
     * @ORM\Column(type="float", nullable=true)
     * @JMS\Groups({"default"})
     */
    protected $total;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getName();
    }

    /**
     * @param float $total
     *
     * @return Bank
     */
    public function setTotal(float $total): Bank
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }
}
