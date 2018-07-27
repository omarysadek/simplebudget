<?php

namespace SimpleBudgetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;

class DefaultController extends Controller
{
    /**
     * @SWG\Response(
     *     response=200,
     *     description="Print Hello World",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Reward::class, groups={"full"}))
     *     )
     * )
     * @SWG\Tag(name="Default")
     * @Security(name="Bearer")
     */
    public function indexAction()
    {
        die('Hello World!');
    }
}
