<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        
        // récupération éventuelle de l'erreur
        $error = $authenticationUtils->getLastAuthenticationError();

        // convertir l'erreur en une chaîne de caractères
        $errorMessage = $error ? $error->getMessage() : '';
        
        // récupération éventuelle du dernier nom de login utilisé
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $errorMessage // Utilisez $errorMessage au lieu de $error
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){
        
    }
}
