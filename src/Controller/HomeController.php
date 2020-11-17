<?php

namespace App\Controller;


use App\Repository\AlaUneRepository;
use App\Repository\AppelProjetRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * Les appels à projets qui sont à la page index.
     */
    public function index(AppelProjetRepository $appelProjetRepository):Response
    {
        return $this->render('home/index.html.twig', [
            'appel_projets' => $appelProjetRepository->findAll(),
            ]);
    }

    /**
     * @Route("/alaune", name="alaune")
     */
    public function alaune(AlaUneRepository $alaUneRepository):Response
    {
        return $this->render('home/index.html.twig', [
            'ala_unes' => $alaUneRepository->findAll(),
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
        return $this->render('cnetrederechercheaction/etude.html.twig');
    }

    /**
     * @Route("/acteurs", name="acteurs")
     */
    public function acteurs()
    {
        return $this->render('cnetrederechercheaction/acteurs.html.twig');
    }

    /**
     * @Route("/fonddocumentaire", name="fonddocumentaire")
     */
    public function fonddocumentaire()
    {
        return $this->render('centrederechercheaction/fonddocumentaire.html.twig');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('admin/index.html.twig');
    }

     
}
