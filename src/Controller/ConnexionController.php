<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;

class ConnexionController extends AbstractController
{
    //#[Route('/connexion', name: 'app_connexion')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('isConnected', true);
        $isConnected = $session->get('isConnected');
        return $this->render('home/index.html.twig', ['isConnected' => $isConnected]);
        
    }

    public function disconect(Request $request): Response 
    {
        $session = $request->getSession();
        $isConnected = $session->get('isConnected');
        if($isConnected) {
            $session->set('isConnected', false);
             return $this->render('home/index.html.twig', ['isConnected' => $isConnected]);
        } else {
            return $this->redirectToRoute('home/index.html.twig', ['isConnected' => $isConnected]);
        }
    }
}