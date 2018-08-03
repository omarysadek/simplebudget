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
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $editable;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected $total;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $order;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="accounts")
     * @ORM\JoinColumn(name="belongs_to", referencedColumnName="id")
     */
    protected $belongsTo;

    /**
     * @ORM\OneToMany(targetEntity="Budget", mappedBy="account")
     * @ORM\OrderBy({"order" = "ASC"})
     */
    protected $budgets;

    public function __construct()
    {
        $this->budgets = new ArrayCollection();
    }

    /**
     * @param bool $bool
     *
     * @return Account
     */
    public function setEditable(bool $bool): Account
    {
        $this->editable = $bool;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->editable;
    }

    /**
     * @param float $total
     *
     * @return Account
     */
    public function setTotal(float $total): Account
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param int $order
     *
     * @return Account
     */
    public function setOrder(int $order): Account
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param Client $client
     *
     * @return Account
     */
    public function setBelongsTo(Client $client): Account
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Client
     */
    public function getBelongsTo(): Client
    {
        return $this->client;
    }

    /**
     * @param ArrayCollection $budgets
     *
     * @return Account
     */
    public function setBudgets(ArrayCollection $budgets): Account
    {
        $this->budgets = $budgets;

        return $this;
    }

    /**
     * @param Budget $account
     *
     * @return Account
     */
    public function addBudget(Budget $budget): Account
    {
        $budget->setAccount($this);
        $this->budgets->add($account);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBudgets(): ArrayCollection
    {
        return $this->budgets;
    }
}
