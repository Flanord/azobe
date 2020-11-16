<?php

namespace App\Controller\Admin;

use App\Entity\AlaUne;
use App\Entity\Images;
use App\Form\AlaUneType;
use App\Repository\AlaUneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/ala/une")
 */
class AlaUneController extends AbstractController
{
    /**
     * @Route("/", name="ala_une_index", methods={"GET"})
     */
    public function index(AlaUneRepository $alaUneRepository): Response
    {
        return $this->render('admin/ala_une/index.html.twig', [
            'ala_unes' => $alaUneRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ala_une_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $alaUne = new AlaUne();
        $form = $this->createForm(AlaUneType::class, $alaUne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             //On récupère les images transmises
             $images = $form->get('images')->getData();
             //On boucle sur les images.
             foreach($images as $image){
                 //On génère un nouveau nom de fichier.
                 $fichier = md5(uniqid()).'.'.$image->guessExtension();
 
                 //On copier le fichier dans le dossier upload
                 $image->move( 
                     $this->getParameter('images_directory'), $fichier
                 );
 
                 //On stocke l'image dans la base de données (son nom)
                 $img = new Images();
                 $img -> setName($fichier);
                 $alaUne->addImage($img);
             }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($alaUne);
            $entityManager->flush();

            return $this->redirectToRoute('ala_une_index');
        }

        return $this->render('admin/ala_une/new.html.twig', [
            'ala_une' => $alaUne,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ala_une_show", methods={"GET"})
     */
    public function show(AlaUne $alaUne): Response
    {
        return $this->render('admin/ala_une/show.html.twig', [
            'ala_une' => $alaUne,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ala_une_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AlaUne $alaUne): Response
    {
        $form = $this->createForm(AlaUneType::class, $alaUne);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
             //On récupère les images transmises
             $images = $form->get('images')->getData();
             //On boucle sur les images.
             foreach($images as $image){
                 //On génère un nouveau nom de fichier.
                 $fichier = md5(uniqid()).'.'.$image->guessExtension();
 
                 //On copier le fichier dans le dossier upload
                 $image->move( 
                     $this->getParameter('images_directory'), $fichier
                 );
 
                 //On stocke l'image dans la base de données (son nom)
                 $img = new Images();
                 $img -> setName($fichier);
                 $alaUne->addImage($img);
             }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ala_une_index');
        }

        return $this->render('admin/ala_une/edit.html.twig', [
            'ala_une' => $alaUne,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ala_une_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AlaUne $alaUne): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alaUne->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($alaUne);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ala_une_index');
    }
}
