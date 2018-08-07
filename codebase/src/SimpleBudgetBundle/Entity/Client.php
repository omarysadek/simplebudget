<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client extends User
{
    /**
     * @ORM\OneToMany(targetEntity="Account", mappedBy="belongsTo")
     * @ORM\OrderBy({"order" = "ASC"})
     */
    protected $accounts;

    /**
     * @ORM\OneToMany(targetEntity="Transfer", mappedBy="client")
     */
    protected $transfers;

    public function __construct()
    {
        $this->accounts = new ArrayCollection();
        $this->transfers = new ArrayCollection();
    }

    /**
     * @param ArrayCollection $accounts
     *
     * @return Client
     */
    public function setAccounts(ArrayCollection $accounts): Client
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * @param Account $account
     *
     * @return Client
     */
    public function addAccount(Account $account): Client
    {
        $account->setBelongsTo($this);
        $this->accounts->add($account);

        return $this;
    }

    /**
     * @param Account $account
     *
     * @return Client
     */
    public function removeAccount(Account $account): Client
    {
        $this->accounts->removeElement($account);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAccounts(): ArrayCollection
    {
        return $this->accounts;
    }

    /**
     * @param ArrayCollection $transfers
     *
     * @return Client
     */
    public function setTransfers(ArrayCollection $transfers): Client
    {
        $this->transfers = $transfers;

        return $this;
    }

    /**
     * @param Transfer $transfers
     *
     * @return Client
     */
    public function addTransfer(Transfer $transfers): Client
    {
        $transfers->setClient($this);
        $this->transfers->add($transfers);

        return $this;
    }

    /**
     * @param Transfer $transfers
     *
     * @return Client
     */
    public function removeTransfer(Transfer $transfers): Client
    {
        $this->transfers->removeElement($transfers);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTransfers(): ArrayCollection
    {
        return $this->transfers;
    }
}
