<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        return $this->render('default/index.html.twig', array('user' => $user));
        //            ['base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,]);
    }
}
