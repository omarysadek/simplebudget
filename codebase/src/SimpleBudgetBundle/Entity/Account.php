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
    public function setEditable(bool $bool) : Account
    {
        $this->editable = $bool;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEditable() : bool
    {
        return $this->editable;
    }

    /**
     * @param float $total
     *
     * @return Account
     */
    public function setTotal(float $total) : Account
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal() : float
    {
        return $this->total;
    }

    /**
     * @param integer $order
     *
     * @return Account
     */
    public function setOrder(int $order) : Account
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOrder() : int
    {
        return $this->order;
    }
}