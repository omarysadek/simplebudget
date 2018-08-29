<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Traits;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

trait NameTrait
{
    /**
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank(groups={"Create"})
     */
    protected $name;

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
