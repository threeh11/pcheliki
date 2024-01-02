<?php

namespace App\Controller\Auth;

use App\Modules\Auth\Scenarios\Readers\AuthReaders;
use App\Modules\Infrastructure\Base\BaseAuthController;
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use Symfony\Component\HttpFoundation\{JsonResponse, Response};
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends BaseAuthController
{
    public function __construct(
        private readonly AuthReaders $authReaders,
    ) {
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

    #[Route('auth/get-countries', name: 'get_countries_for_select', methods: ['GET'])]
    public function getCountryForSelect(): JsonResponse
    {
        $dataCountries = $this->authReaders->getCountries();
        return new JsonResponse(['countries_codes' => $dataCountries]);
    }

}