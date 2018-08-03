<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Traits;

use Doctrine\ORM\Mapping as ORM;

trait UpdatedByTrait
{
    /**
     * @ORM\Column(type="date")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedBy;

    /**
     * @return User
     */
    public function getUpdatedBy() : User
    {
        return $this->updatedBy;
    }
}