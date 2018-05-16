<?php

namespace InscriptionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/essai")
     */
    public function indexAction()
    {
        return $this->render('@Inscription/Default/index.html.twig');
    }
}
