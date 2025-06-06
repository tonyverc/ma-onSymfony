<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $utils): Response
    {
        // get the login error if there is one
        $error = $utils->getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();


        return $this->render('security/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
