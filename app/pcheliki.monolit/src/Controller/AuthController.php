<?php

namespace App\Controller;

use App\modules\Auth\Scenarios\Others\AuthRequestTransformer;
use App\modules\Infrastructure\Base\BaseAuthController;
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends BaseAuthController
{
    public function __construct(
        private readonly AuthRequestTransformer $authRequestTransformer,
    ) {
        parent::__construct();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/reg', name: 'index_register', methods: ['GET'])]
    public function index(): Response
    {
        // Тут потом будет генерация qr кода
        return $this->sendPage('base.twig.html', []);
    }

    #[Route('reg/check_number', name: 'register_check_number', methods: ['POST'])]
    public function checkNumber(Request $request): Response
    {
        $dto = $this->authRequestTransformer->requestToCheckNumber($request);
    }

}