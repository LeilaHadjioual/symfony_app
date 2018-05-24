<?php
/**
 * Created by PhpStorm.
 * User: leila.hadjioual
 * Date: 16/05/2018
 * Time: 12:00
 */

namespace InscriptionBundle\Controller;

use InscriptionBundle\Entity\Utilisateur;
use InscriptionBundle\Form\UtilisateurType;
use InscriptionBundle\InscriptionBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;


class UtilisateurController extends Controller
{
    /**
     * creates a new user
     *
     * @Route("/inscription/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function ajoutAction(Request $request)
//    {
//        $utilisateur = new Utilisateur();
//        $form = $this->createForm('InscriptionBundle\Form\UtilisateurType', $utilisateur);
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($utilisateur);
//            $em->flush($utilisateur);
//
//        }
//        if ($request->isMethod('POST')) {
//            $request->getSession()->getFlashBag()->add("success", "inscription validée");
//            return $this->redirect($this->generateUrl('user_new', array('id' => $utilisateur->getId())));
//
//        }
//        return $this->render('@Inscription/Default/ajoutUtilisateur.html.twig', array(
//           'utilisateur' => $utilisateur,
//            'form' => $form->createView(),
//        ));
//    }
    {
        //on crée un objet utilisateur
        $utilisateur = new Utilisateur();

        //on crée le formBuilder grace au service form factory
//        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $utilisateur);

        //2ème méthode avec utilisateurType crée en ligne de commande generate:form
//        $form =$this->get('form.factory')->create(UtilisateurType::class, $utilisateur);

        //3ème méthode
        $form =$this->createForm(UtilisateurType::class, $utilisateur);

//        //on ajoute les champs
//        $formBuilder
//            ->add('nom')
//            ->add('prenom')
//            ->add('mail')
//            ->add('password');
//
//        //on génère le formulaire
//        $form = $formBuilder->getForm();

        //si la requête est en POST, on fait le lien requete/formulaire
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            //la variable $utilisateur contient les valeurs entrées dans le form
//            $form->handleRequest($request);

            //on vérifie que les valeurs sont correctes
//            if ($form->isValid()) {

                //on enregistre l'objet $utilisateur dans la BDD
                $em = $this->getDoctrine()->getManager();
                $em->persist($utilisateur);
                $em->flush();

                //on affiche un message de validation
                $request->getSession()->getFlashBag()->add("success", "inscription validée");

                //on redirige vers la page de l'utilisateur créée
                return $this->redirectToRoute('user_new');
            }
//        }
        return $this->render('@Inscription/Default/ajoutUtilisateur.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * lists all users
     * @Route("/liste", name="user_list")
     * @Method("GET")
     */
    public function listUser()
    {
        $em = $this->getDoctrine()->getManager();

        $utilisateurs = $em->getRepository(Utilisateur::class)->findAll();

        return $this->render('@Inscription/Default/listeUtilisateur.html.twig', array(
            'utilisateurs' => $utilisateurs,
        ));
    }
}