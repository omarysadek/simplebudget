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
     * @param date $date
     *
     * @return date
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }
}

