<?php

namespace SimpleBudgetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;

class DefaultController extends Controller
{
    public function indexAction()
    {
        die('Hello World!');
    }
}
