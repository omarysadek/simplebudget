<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Traits;

use Doctrine\ORM\Mapping as ORM;

trait NameTrait
{
    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @param  string $name
     *
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}