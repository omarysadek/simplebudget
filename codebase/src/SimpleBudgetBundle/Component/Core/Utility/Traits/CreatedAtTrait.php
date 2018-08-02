<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait CreatedAtTrait
{
    /**
     * @ORM\Column(type="date")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}