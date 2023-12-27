<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegisterController extends AbstractController
{

    #[Route('/a', name: 'reg')]
    public function index(): Response
    {
        return $this->render('base.html.twig', []);
    }

}