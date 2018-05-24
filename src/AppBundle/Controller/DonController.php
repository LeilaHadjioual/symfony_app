<?php

namespace AppBundle\Controller;

use InscriptionBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DonController extends Controller
{
    /**
     * @Route("/don/{id}", name="faire_don")
     */
    public function faireDonAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository(Projet::class)->find($id);

        return $this->render('@App/Don/faire_don.html.twig', array('projet' => $projet, 'id'=>$id));
    }

}
