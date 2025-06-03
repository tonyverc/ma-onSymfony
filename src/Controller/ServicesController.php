<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(ServicesRepository $servicesRepo): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
            'services'=> $servicesRepo->findAll(),
        ]);
    }
}
