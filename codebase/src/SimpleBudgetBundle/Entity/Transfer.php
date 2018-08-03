<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\CreatedAtTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\CreatedByTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="transfer")
 */
class Transfer
{
    use IdTrait;
    use CreatedAtTrait;
    use CreatedByTrait;

    /**
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * @param DateTime $date
     *
     * @return Transfer
     */
    public function setDate(DateTime $date) : Transfer
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate() : DateTime
    {
        return $this->date;
    }
}

