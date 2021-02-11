<?php

namespace App\Controller\Admin;

use App\Entity\AzobeChiffre;
use App\Form\AzobeChiffreType;
use App\Repository\AzobeChiffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/azobe/chiffre")
 */
class AzobeChiffreController extends AbstractController
{
    /**
     * @Route("/", name="azobe_chiffre_index", methods={"GET"})
     */
    public function index(AzobeChiffreRepository $azobeChiffreRepository): Response
    {
        return $this->render('admin/azobe_chiffre/index.html.twig', [
            'azobe_chiffres' => $azobeChiffreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="azobe_chiffre_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $azobeChiffre = new AzobeChiffre();
        $form = $this->createForm(AzobeChiffreType::class, $azobeChiffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($azobeChiffre);
            $entityManager->flush();

            return $this->redirectToRoute('azobe_chiffre_index');
        }

        return $this->render('admin/azobe_chiffre/new.html.twig', [
            'azobe_chiffre' => $azobeChiffre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="azobe_chiffre_show", methods={"GET"})
     */
    public function show(AzobeChiffre $azobeChiffre): Response
    {
        return $this->render('admin/azobe_chiffre/show.html.twig', [
            'azobe_chiffre' => $azobeChiffre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="azobe_chiffre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AzobeChiffre $azobeChiffre): Response
    {
        $form = $this->createForm(AzobeChiffreType::class, $azobeChiffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('azobe_chiffre_index');
        }

        return $this->render('admin/azobe_chiffre/edit.html.twig', [
            'azobe_chiffre' => $azobeChiffre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="azobe_chiffre_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AzobeChiffre $azobeChiffre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$azobeChiffre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($azobeChiffre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('azobe_chiffre_index');
    }
}
