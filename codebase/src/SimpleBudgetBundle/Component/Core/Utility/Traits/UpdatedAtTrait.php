<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Traits;

use Doctrine\ORM\Mapping as ORM;

trait UpdatedAtTrait
{
    /**
     * @ORM\Column(type="date")
     * @Gedmo\Blameable(on="update")
     */
    protected $updatedAt;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt() : DateTime
    {
        return $this->updatedAt;
    }
}