<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait CreatedByTrait
{
    /**
     * @ORM\Column(type="date")
     * @Gedmo\Blameable(on="create")
     */
    protected $createdBy;

    /**
     * @return User
     */
    public function getCreatedBy() : User
    {
        return $this->createdBy;
    }
}