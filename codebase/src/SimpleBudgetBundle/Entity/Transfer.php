<?php

namespace SimpleBudgetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SimpleBudgetBundle\Component\Core\Utility\Traits\IdTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="transfer")
 */
class Transfer
{
    use IdTrait;

    /**
     * @ORM\Column(name="schedule_at", type="datetime")
     */
    protected $scheduleAt;

    /**
     * @ORM\ManyToOne(targetEntity="Budget", inversedBy="outTrannsfers")
     * @ORM\JoinColumn(name="budget_from", referencedColumnName="id")
     */
    protected $budgetFrom;

    /**
     * @ORM\ManyToOne(targetEntity="Budget", inversedBy="inTrannsfer")
     * @ORM\JoinColumn(name="budget_to", referencedColumnName="id")
     */
    protected $budgetTo;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="transfers")
     */
    protected $client;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $comment;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getId();
    }

    /**
     * @param \DateTime $scheduleAt
     *
     * @return Transfer
     */
    public function setScheduleAt(\DateTime $scheduleAt): Transfer
    {
        $this->scheduleAt = $scheduleAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getScheduleAt(): \DateTime
    {
        return $this->scheduleAt;
    }

    /**
     * @param Budget $budgetFrom
     *
     * @return Transfer
     */
    public function setBudgetFrom(Budget $budgetFrom): Transfer
    {
        $this->budgetFrom = $budgetFrom;

        return $this;
    }

    /**
     * @return Budget
     */
    public function getBudgetFrom(): Budget
    {
        return $this->budgetFrom;
    }

    /**
     * @param Budget $budgetTo
     *
     * @return Transfer
     */
    public function setBudgetTo(Budget $budgetTo): Transfer
    {
        $this->budgetTo = $budgetTo;

        return $this;
    }

    /**
     * @return Budget
     */
    public function getBudgetTo(): Budget
    {
        return $this->budgetTo;
    }

    /**
     * @param Client $client
     *
     * @return Transfer
     */
    public function setClient(Client $client): Transfer
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param string $comment
     *
     * @return Transfer
     */
    public function setComment(string $comment): Transfer
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
