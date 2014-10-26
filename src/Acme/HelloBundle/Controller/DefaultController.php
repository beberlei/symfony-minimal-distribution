<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function helloAction($name)
    {
        return $this->render(
            'AcmeHelloBundle:Default:hello.html.twig',
            array('name' => $name)
        );
    }
}
