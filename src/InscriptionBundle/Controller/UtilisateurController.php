<?php
/**
 * Created by PhpStorm.
 * User: leila.hadjioual
 * Date: 16/05/2018
 * Time: 12:00
 */

namespace InscriptionBundle\Controller;

use InscriptionBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * inscription controller.
 *
 * @Route("inscription")
 */

class UtilisateurController extends Controller
{
    /**
     * @Route("/new")
     *
     */
    public function ajoutAction(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm('InscriptionBundle\Form\UtilisateurType', $utilisateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush($utilisateur);

        }
        return $this->render('@Inscription/Default/ajoutUtilisateur.html.twig', array(
           'utilisateur' => $utilisateur,
            'form' => $form->CreateView(),
        ));
    }

    /**
     * @Route("/liste")
     *
     */
    public function listUser(){
        $em = $this->getDoctrine()->getManager();

        $utilisateurs = $em->getRepository('InscriptionBundle:Utilisateur')->findAll();

        return $this->render('@Inscription/Default/listeUtilisateur.html.twig', array(
            'utilisateurs' => $utilisateurs,
        ));
    }
}