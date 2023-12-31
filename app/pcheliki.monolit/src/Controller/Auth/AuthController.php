<?php

namespace App\Controller\Auth;

use App\Modules\Infrastructure\Base\BaseAuthController;
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use Symfony\Component\HttpFoundation\{File\Exception\AccessDeniedException, Response};
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends BaseAuthController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/a', name: 'index_register', methods: ['GET'])]
    public function index(): Response
    {
        return $this->sendPage('auth/index.html.twig', []);
    }

}