<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\AppelProjet;


/**
 * @Route("/admin", name="_admin")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="home")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

}
