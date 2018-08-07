<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;
use SimpleBudgetBundle\Component\Core\Utility\Traits\NameTrait;
use SimpleBudgetBundle\Component\Budget\Enum\CostByEnum;
use SimpleBudgetBundle\Component\Core\Exception\ExceptionEnum;

/**
 * @ORM\Entity
 * @ORM\Table(name="budget")
 */
class Budget
{
    use IdTrait;
    use NameTrait;

    /**
     * @ORM\Column(name="cost_amount", type="float", nullable=true)
     */
    protected $costAmount;

    /**
     * By percentage, amout.
     *
     * @var SimpleBudgetBundle\Component\Core\Utility\Enum\Enum\CostByEnum
     *
     * @ORM\Column(name="cost_by", type="string", nullable=true)
     */
    protected $costBy;

    /**
     * @ORM\Column(type="integer")
     */
    protected $order;

    /**
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="budgets")
     */
    protected $account;

    /**
     * @ORM\Column(name="is_saving", type="boolean")
     */
    protected $saving;

    /**
     * @ORM\ManyToOne(targetEntity="Bank")
     */
    protected $bank;

    /**
     * @ORM\OneToMany(targetEntity="Transfer", mappedBy="budgetFrom")
     * @ORM\JoinColumn(name="out_trannsfers", referencedColumnName="id")
     */
    protected $outTrannsfers;

    /**
     * @ORM\OneToMany(targetEntity="Transfer", mappedBy="budgetTo")
     * @ORM\JoinColumn(name="in_trannsfers", referencedColumnName="id")
     */
    protected $inTrannsfers;

    public function __construct()
    {
        $this->outTrannsfers = new ArrayCollection();
        $this->inTrannsfers = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getName();
    }

    /**
     * @param float $costAmount
     *
     * @return Budget
     */
    public function setCostAmount(float $costAmount): Budget
    {
        $this->costAmount = $costAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getCostAmount(): float
    {
        return $this->costAmount;
    }

    /**
     * @param string $costBy
     *
     * @return Budget
     */
    public function setCostBy(string $costBy): Budget
    {
        if (!CostByEnum::isValidValue($costBy)) {
            ExceptionEnum::throwInvalidArgumentException('Invalid budget cost_by enum', ExceptionEnum::INVALID_COST_BY_ENUM);
        }
        $this->costBy = $costBy;

        return $this;
    }

    /**
     * @return string
     */
    public function getCostBy(): string
    {
        return $this->costBy;
    }

    /**
     * @param int $order
     *
     * @return Budget
     */
    public function setOrder(int $order): Budget
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
     * @param Account $account
     *
     * @return Budget
     */
    public function setAccount(Account $account): Budget
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param bool $saving
     *
     * @return Budget
     */
    public function setSaving(bool $saving): Budget
    {
        $this->saving = $saving;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSaving(): bool
    {
        return $this->saving;
    }

    /**
     * @param Bank $bank
     *
     * @return Account
     */
    public function setBank(Bank $bank): Budget
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

    /**
     * @param ArrayCollection $outTrannsfers
     *
     * @return Budget
     */
    public function setOutTrannsfers(ArrayCollection $outTrannsfers): Budget
    {
        $this->outTrannsfers = $outTrannsfers;

        return $this;
    }

    /**
     * @param Transfer $outTrannsfer
     *
     * @return Budget
     */
    public function addOutTrannsfer(Transfer $outTrannsfer): Budget
    {
        $outTrannsfer->setBudgetFrom($this);
        $this->outTrannsfers->add($outTrannsfer);

        return $this;
    }

    /**
     * @param Transfer $outTrannsfer
     *
     * @return Budget
     */
    public function removeOutTrannsfer(Transfer $outTrannsfer): Budget
    {
        $this->outTrannsfers->removeElement($outTrannsfer);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOutTrannsfers(): ArrayCollection
    {
        return $this->outTrannsfers;
    }

    /**
     * @param ArrayCollection $inTrannsfers
     *
     * @return Budget
     */
    public function setInTrannsfers(ArrayCollection $inTrannsfers): Budget
    {
        $this->inTrannsfers = $inTrannsfers;

        return $this;
    }

    /**
     * @param Transfer $inTrannsfer
     *
     * @return Budget
     */
    public function addInTrannsfer(Transfer $inTrannsfer): Budget
    {
        $inTrannsfer->setBudgetTo($this);
        $this->inTrannsfers->add($inTrannsfer);

        return $this;
    }

    /**
     * @param Transfer $inTrannsfer
     *
     * @return Budget
     */
    public function removeInTrannsfer(Transfer $inTrannsfer): Budget
    {
        $this->inTrannsfers->removeElement($inTrannsfer);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getInTrannsfers(): ArrayCollection
    {
        return $this->inTrannsfers;
    }
}
