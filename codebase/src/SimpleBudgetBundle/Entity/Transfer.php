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
     * @ORM\Column(type="datetime")
     */
    protected $at;

    /**
     * @ORM\ManyToOne(targetEntity="Budget")
     */
    protected $from;

    /**
     * @ORM\ManyToOne(targetEntity="Budget")
     */
    protected $to;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     */
    protected $client;

    /**
     * @param \DateTime $at
     *
     * @return Transfer
     */
    public function setAt(\DateTime $at): Transfer
    {
        $this->at = $at;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAt(): \DateTime
    {
        return $this->at;
    }

    /**
     * @param Budget $from
     *
     * @return Transfer
     */
    public function setFrom(Budget $from): Transfer
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return Budget
     */
    public function getFrom(): Budget
    {
        return $this->from;
    }

    /**
     * @param Budget $to
     *
     * @return Transfer
     */
    public function setTo(Budget $to): Transfer
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return Budget
     */
    public function getTo(): Budget
    {
        return $this->to;
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
}
