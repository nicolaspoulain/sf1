<?php

namespace Nico\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NicoBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
