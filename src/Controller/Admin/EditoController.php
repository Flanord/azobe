<?php

namespace App\Controller\Admin;

use App\Entity\Edito;
use App\Form\EditoType;
use App\Repository\EditoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/edito", name="edito")
 */
class EditoController extends AbstractController
{
    /**
     * @Route("/", name="edito_index", methods={"GET"})
     */
    public function index(EditoRepository $editoRepository): Response
    {
        return $this->render('edito/index.html.twig', [
            'editos' => $editoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="edito_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $edito = new Edito();
        $form = $this->createForm(EditoType::class, $edito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($edito);
            $entityManager->flush();

            return $this->redirectToRoute('edito_index');
        }

        return $this->render('edito/new.html.twig', [
            'edito' => $edito,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="edito_show", methods={"GET"})
     */
    public function show(Edito $edito): Response
    {
        return $this->render('edito/show.html.twig', [
            'edito' => $edito,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edito_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Edito $edito): Response
    {
        $form = $this->createForm(EditoType::class, $edito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('edito_index');
        }

        return $this->render('edito/edit.html.twig', [
            'edito' => $edito,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="edito_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Edito $edito): Response
    {
        if ($this->isCsrfTokenValid('delete'.$edito->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($edito);
            $entityManager->flush();
        }

        return $this->redirectToRoute('edito_index');
    }
}
