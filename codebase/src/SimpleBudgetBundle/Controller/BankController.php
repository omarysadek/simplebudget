<?php

namespace SimpleBudgetBundle\Controller;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use SimpleBudgetBundle\Component\Core\Utility\Controller\BaseController;
use SimpleBudgetBundle\Entity\Bank;

class BankController extends BaseController
{
    /**
     * @ParamConverter(
     *      "bank",
     *      class="SimpleBudgetBundle\Entity\Bank",
     *      converter="fos_rest.request_body",
     *      options={"deserializationContext"={"groups"={"creat"}}}
     *  )
     *
     * @SWG\Post(
     *   @SWG\Parameter(
     *     in="body",
     *     name="body",
     *     required=true,
     *     @SWG\Schema(
     *              type="object",
     *              required={"name"},
     *              @SWG\Property(property="name", type="string"),
     *          )
     *   ),
     *   @SWG\Response(response="200", description="", @Model(type=Bank::class))
     * )
     */
    public function postAction(Bank $bank, ConstraintViolationListInterface $violations)
    {
        $this->checkViolations($violations);

        $em = $this->getDoctrine()->getManager();
        $em->persist($bank);
        $em->flush();

        //redirect
        return $this->handleView($this->view($bank));
    }
}
