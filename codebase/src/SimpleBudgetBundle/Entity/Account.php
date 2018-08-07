<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(name="is_editable" ,type="boolean", nullable=false)
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

    /**
     * @ORM\Column(name="limit", type="integer", nullable=true)
     */
    protected $limit;

    /**
     * @ORM\Column(name="is_income", type="boolean")
     */
    protected $income;

    /**
     * @ORM\ManyToOne(targetEntity="Bank")
     */
    protected $bank;

    public function __construct()
    {
        $this->budgets = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getName();
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
        $this->belongsTo = $client;

        return $this;
    }

    /**
     * @return Client
     */
    public function getBelongsTo(): Client
    {
        return $this->belongsTo;
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
        $this->budgets->add($budget);

        return $this;
    }

    /**
     * @param Budget $intervenants
     *
     * @return Account
     */
    public function removeBudget(Budget $budget): Account
    {
        $this->budgets->removeElement($budget);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBudgets(): ArrayCollection
    {
        return $this->budgets;
    }

    /**
     * @param int $limit
     *
     * @return Account
     */
    public function setLimit(int $limit): Account
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param bool $income
     *
     * @return Account
     */
    public function setIncome(bool $income): Account
    {
        $this->income = $income;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIncome(): bool
    {
        return $this->income;
    }

    /**
     * @param Bank $bank
     *
     * @return Account
     */
    public function setBank(Bank $bank): Account
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * @return Bank
     */
    public function getBank(): Bank
    {
        return $this->bank;
    }
}
