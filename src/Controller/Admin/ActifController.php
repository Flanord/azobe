<?php

namespace App\Controller\Admin;

use App\Entity\Actif;
use App\Entity\ImageActif;
use App\Form\ActifType;
use App\Repository\ActifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/actif")
 */
class ActifController extends AbstractController
{
    /**
     * @Route("/", name="actif_index", methods={"GET"})
     */
    public function index(ActifRepository $actifRepository): Response
    {
        return $this->render('admin/actif/index.html.twig', [
            'actifs' => $actifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="actif_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $actif = new Actif();
        $form = $this->createForm(ActifType::class, $actif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            

             //On récupère les images transmises
             $imageActifs = $form->get('imageActifs')->getData();
             //On boucle sur les images.
             foreach($imageActifs as $imageActif){
                 //On génère un nouveau nom de fichier.
                 $fichier = md5(uniqid()).'.'.$imageActif->guessExtension();
 
                 //On copie le fichier dans le dossier upload
                 $imageActif->move( 
                     $this->getParameter('images_directory'), $fichier
                 );
 
                 //On stocke l'image dans la base de données (son nom)
                 $img = new ImageActif();
                 $img -> setName($fichier);
                 $actif->addImageActif($img);
             }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actif);
            $entityManager->flush();

            return $this->redirectToRoute('actif_index');
        }

        return $this->render('admin/actif/new.html.twig', [
            'actif' => $actif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actif_show", methods={"GET"})
     */
    public function show(Actif $actif): Response
    {
        return $this->render('admin/actif/show.html.twig', [
            'actif' => $actif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="actif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Actif $actif): Response
    {
        $form = $this->createForm(ActifType::class, $actif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //On récupère les images transmises
            $imageActifs = $form->get('imageActifs')->getData();
            //On boucle sur les images.
            foreach($imageActifs as $imageActif){
                //On génère un nouveau nom de fichier.
                $fichier = md5(uniqid()).'.'.$imageActif->guessExtension();

                //On copier le fichier dans le dossier upload
                $imageActif->move( 
                    $this->getParameter('images_directory'), $fichier
                );

                //On stocke l'image dans la base de données (son nom)
                $img = new ImageActif();
                $img -> setName($fichier);
                $actif->addImageActif($img);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actif_index');
        }

        return $this->render('admin/actif/edit.html.twig', [
            'actif' => $actif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actif_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Actif $actif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($actif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('actif_index');
    }
}
