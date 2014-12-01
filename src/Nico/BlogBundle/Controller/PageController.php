<?php
// src/Nico/BlogBundle/Controller/PageController.php

namespace Nico\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('NicoBlogBundle:Page:index.html.twig');
    }
}
