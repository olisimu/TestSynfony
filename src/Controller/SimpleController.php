<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SimpleController extends AbstractController
{
    /**
     * @Route("/simple", name="simple")
     */
    public function index()
    {
        return $this->render('simple/index.html.twig', [
            'controller_name' => 'SimpleController',
        ]);
    }
    
    /**
     * @Route("/simple/sendToDB/{nom}/{prenom}", name="sendToDB")
     */
    public function sendToDB($nom,$prenom)
    {
        return new Response($nom ." ".$prenom." a ete cree !");
    }
    
    /**
     * @Route("/simple/getFromDB/", name="getFromDB")
     */
    public function getFromDB()
    {
        return $this->json(['nick' => 'Oli','name' => 'Ver']);
    }
}
