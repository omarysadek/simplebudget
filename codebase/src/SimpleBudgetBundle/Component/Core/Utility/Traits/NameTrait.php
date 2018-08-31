<?php

namespace SimpleBudgetBundle\Component\Core\Utility\Traits;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

trait NameTrait
{
    /**
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotBlank(message="name: should not be blank")
     * @JMS\Groups({"default", "creat"})
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
