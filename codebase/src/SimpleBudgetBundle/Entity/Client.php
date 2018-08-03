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

    public function __construct()
    {
        $this->accounts = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getAccounts(): ArrayCollection
    {
        return $this->accounts;
    }
}
