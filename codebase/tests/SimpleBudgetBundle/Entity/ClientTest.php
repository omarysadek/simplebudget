<?php

namespace Tests\SimpleBudgetBundle\Entity;

use SimpleBudgetBundle\Entity\Client;
use SimpleBudgetBundle\Entity\Account;
use SimpleBudgetBundle\Entity\Transfer;

class ClientTest extends EntityBaseTestCase
{
    protected function setUp()
    {
        $this->model = new Client();
        $this->model->setUsername(Client::class);
    }

    /**
     * @test
     */
    public function accounts()
    {
        $this->collectionsTest('accounts', new Account());
    }

    /**
     * @test
     */
    public function transfers()
    {
        $this->collectionsTest('transfers', new Transfer());
    }
}
