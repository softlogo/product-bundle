<?php

namespace Softlogo\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SoftlogoProductBundle:Default:index.html.twig', array('name' => $name));
    }
}
