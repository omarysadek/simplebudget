<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\NameTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="account")
 */
class Account
{
    use IdTrait;
    use NameTrait;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $editable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $total;

    /**
     * @ORM\Column(type="integer")
     */
    protected $order;

    /**
     * @param bool $bool
     *
     * @return Account
     */
    public function setEditable($bool)
    {
        $this->editable = $bool;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEditable()
    {
        return $this->editable;
    }

    /**
     * @param integer $total
     *
     * @return Account
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param integer $order
     *
     * @return Account
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }
}