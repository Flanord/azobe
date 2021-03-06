<?php

namespace App\Controller;


use App\Repository\AlaUneRepository;
use App\Repository\AppelProjetRepository;
use App\Entity\AlaUne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AlaUneType;
use App\Repository\ActifRepository;
use App\Repository\ActuRepository;
use App\Repository\AzobeChiffreRepository;
use App\Repository\EditoRepository;


class HomeController extends AbstractController
{


     /**
     * @Route("/", name="home")
     */
    public function index(AlaUneRepository $alaUneRepository, AppelProjetRepository $appelProjetRepository, ActifRepository $actifRepository,EditoRepository $editoRepository, ActuRepository $actuRepository, AzobeChiffreRepository $azobechiffreRepository)
    {
        //  dump($editoRepository->findAll());
        //  die();
        return $this->render('home/index.html.twig', [
            'ala_unes'      => $alaUneRepository     ->findAll(),
            'appel_projets' => $appelProjetRepository->findAll(),
            'actifs'        => $actifRepository      ->findAll(),
            'editos'        => $editoRepository      ->findAll(),
            'actus'         => $actuRepository       ->findAll(),
            'azobe_chiffres' => $azobechiffreRepository ->findAll()
        ]);
    }

    
    /**
     * @Route("/quisommesnous", name="quisommesnous")
     */
    public function quisommesnous()
    {
        return $this->render('quisommesnous/quisommesnous.html.twig');
    }

    /**
     * Les appels à projets de la page appelaprojet.html.twig
     * @Route("/appelaprojet", name="appelaprojet")
     */
    public function afficheAppelProjet(AppelProjetRepository $appelProjetRepository): Response
    {
        return $this->render('appelaprojet/appelaprojet.html.twig', [
            'appel_projets' => $appelProjetRepository->findAll(),
            ]);
    }

    /**
     * @Route("/etude", name="etude")
     */
    public function etude()
    {
        return $this->render('centrederechercheaction/etude.html.twig');
    }

    /**
     * @Route("/acteurs", name="acteurs")
     */
    public function acteurs()
    {
        return $this->render('centrederechercheaction/acteurs.html.twig');
    }

    /**
     * @Route("/fonddocumentaire", name="fonddocumentaire")
     */
    public function fonddocumentaire()
    {
        return $this->render('centrederechercheaction/fonddocumentaire.html.twig');
    }

   
    /**
     * @Route("admin/ala/une/{id}",name="ala_une_show", methods={"GET"})
     */
    // public function single_post(AlaUneRepository $alaUneRepository,int $id)
    // {   
        
    //     return $this->render('admin/single_post/single_post.html.twig',[
    //         'ala_unes'=> $alaUneRepository->findById(['id'=>$id])
    //     ]);
       
    // }

    /**
     * @Route ("/ala_une/{slug}", name="ala_une")
     */
    public function single_post(AlaUneRepository $alaUneRepository, $slug)
    {   
        
        return $this->render('/admin/single_post/single_post.html.twig',[
            'ala_une'=> $alaUneRepository->findOneBy(['slug'=>$slug])
        ]);
       
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request) : Response
    {
        /**Code qui permet d'afficher le pop-up de la création d'article */
        $alaUne = new AlaUne();
        $form = $this->createForm(AlaUneType::class, $alaUne);
        $form->handleRequest($request);

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

     
}
