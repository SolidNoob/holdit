<?php

namespace Noob\MessagerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NoobMessagerieBundle:Default:index.html.twig', array('name' => $name));
    }
}