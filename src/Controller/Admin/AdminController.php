<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin", name="_admin")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    
     /**
     * @Route("/appel/projet", name="appel_projet")
     */
    public function ajout_appel_projet()
    {
        return $this->redirectToRoute('appel_projet_new');
    }
   
}
