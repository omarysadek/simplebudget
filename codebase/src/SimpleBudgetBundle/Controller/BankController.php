<?php

namespace SimpleBudgetBundle\Controller;

use SimpleBudgetBundle\Component\Core\Utility\Controller\BaseController;
use SimpleBudgetBundle\Entity\Bank;

class BankController extends BaseController
{
    public function getBanksAction()
    {}

    public function postBankAction()
    {
        die("tmp");
    }

    public function getBankAction(Bank $bank)
    {}

    public function putBankAction(Bank $bank)
    {}

    public function removeBankAction(Bank $bank)
    {}
}
