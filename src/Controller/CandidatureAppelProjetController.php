<?php

namespace App\Controller;

use App\Entity\AppelProjet;
use App\Entity\CandidatureAppelProjet;
use App\Form\CandidatureAppelProjetType;
use App\Repository\CandidatureAppelProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidature/appel/projet")
 */
class CandidatureAppelProjetController extends AbstractController 
{
    /**
     * @Route("/", name="candidature_appel_projet_index", methods={"GET"})
     */
    public function index(CandidatureAppelProjetRepository $candidatureAppelProjetRepository): Response
    {
        return $this->render('candidature_appel_projet/index.html.twig', [
            'candidature_appel_projets' => $candidatureAppelProjetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="candidature_appel_projet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $candidatureAppelProjet = new CandidatureAppelProjet();
        $form = $this->createForm(CandidatureAppelProjetType::class, $candidatureAppelProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidatureAppelProjet);
            $entityManager->flush();

            return $this->redirectToRoute('candidature_appel_projet_index');
        }

        return $this->render('candidature_appel_projet/new.html.twig', [
            'candidature_appel_projet' => $candidatureAppelProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidature_appel_projet_show", methods={"GET"})
     */
    public function show(CandidatureAppelProjet $candidatureAppelProjet, $id): Response
    {
        $candidatureAppelProjet = $this -> getDoctrine()
                    ->getRepository(CandidatureAppelProjet::class)
                    ->find($id);
        $appelprojetTitle = $candidatureAppelProjet->getAppelProjet()->getTitle();

        return $this->render('candidature_appel_projet/show.html.twig', [
            'candidature_appel_projet' => $candidatureAppelProjet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="candidature_appel_projet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CandidatureAppelProjet $candidatureAppelProjet): Response
    {
        $form = $this->createForm(CandidatureAppelProjetType::class, $candidatureAppelProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidature_appel_projet_index');
        }

        return $this->render('candidature_appel_projet/edit.html.twig', [
            'candidature_appel_projet' => $candidatureAppelProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidature_appel_projet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CandidatureAppelProjet $candidatureAppelProjet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidatureAppelProjet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidatureAppelProjet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('candidature_appel_projet_index');
    }
}
