<?php

namespace App\Controller;

use App\Entity\Acteurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActeursRepository;
use App\Form\ActeursType;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("acteurs/")
 */
class ActeursController extends AbstractController
{
    /**
     * @Route("/acteurs", name="acteurs")
     */
    public function index(ActeursRepository $acteursRepository): Response
    {
        return $this->render('acteurs/index.html.twig', [
            'acteurs' => $acteursRepository->findAll(),
        ]);
    }

     /**
     * @Route("/new", name="acteurs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $acteurs = new Acteurs();
        $form = $this->createForm(ActeursType::class, $acteurs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($acteurs);
            $entityManager->flush();

            return $this->redirectToRoute('acteurs_index');
        }

        return $this->render('acteurs/new.html.twig', [
            'acteurs' =>$acteurs,
            'form' => $form->createView(),
        ]);
    }

}
