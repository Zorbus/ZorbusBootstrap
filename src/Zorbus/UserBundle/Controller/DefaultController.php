<?php

namespace Zorbus\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function facebookAction()
    {
        return $this->render('ZorbusUserBundle:Default:facebook.html.twig');
    }
}
