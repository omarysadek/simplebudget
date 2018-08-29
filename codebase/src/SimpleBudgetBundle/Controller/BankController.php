<?php

namespace SimpleBudgetBundle\Controller;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use SimpleBudgetBundle\Component\Core\Utility\Controller\BaseController;
use SimpleBudgetBundle\Entity\Bank;

class BankController extends BaseController
{
    /**
     * @ParamConverter("bank", converter="fos_rest.request_body")
     */
    public function postAction(Bank $bank, ConstraintViolationListInterface $violations)
    {
        if (count($violations) > 0) {
            die('violation');
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($bank);
        $em->flush();

        return $this->handleView($this->view($bank));
    }

    public function getBankAction(Bank $bank)
    {}

    public function putBankAction(Bank $bank)
    {}

    public function removeBankAction(Bank $bank)
    {}
}
