<?php

namespace App\Controller\Admin;

use App\Entity\AppelProjet;
use App\Form\AppelProjetType;
use App\Repository\AppelProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/appel/projet")
 */
class AppelProjetController extends AbstractController
{
    /**
     * @Route("/", name="appel_projet_index", methods={"GET"})
     */
    public function index(AppelProjetRepository $appelProjetRepository): Response
    {
        return $this->render('admin/appel_projet/index.html.twig', [
            'appel_projets' => $appelProjetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="appel_projet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $appelProjet = new AppelProjet();
        $form = $this->createForm(AppelProjetType::class, $appelProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($appelProjet);
            $entityManager->flush();

            return $this->redirectToRoute('appel_projet_index');
        }

        return $this->render('admin/appel_projet/new.html.twig', [
            'appel_projet' => $appelProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="appel_projet_show", methods={"GET"})
     */
    public function show(AppelProjet $appelProjet): Response
    {
        return $this->render('admin/appel_projet/show.html.twig', [
            'appel_projet' => $appelProjet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="appel_projet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AppelProjet $appelProjet): Response
    {
        $form = $this->createForm(AppelProjetType::class, $appelProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('appel_projet_index');
        }

        return $this->render('appel_projet/edit.html.twig', [
            'appel_projet' => $appelProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="appel_projet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AppelProjet $appelProjet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appelProjet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($appelProjet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('appel_projet_index');
    }
}
