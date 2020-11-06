<?php

namespace App\Controller;

use App\Entity\Images;
use App\Repository\AppelProjetRepository;
use App\Repository\ImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
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
