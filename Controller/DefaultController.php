<?php

namespace Maastermedia\DojoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('MaastermediaDojoBundle:Default:index.html.twig', array('name' => $name));
    }
}
