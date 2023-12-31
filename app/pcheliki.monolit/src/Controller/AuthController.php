<?php

namespace App\Controller;

use App\Modules\Auth\Scenarios\{
    Actions\AuthSendMessageAction,
    Others\AuthRequestTransformer
};
use App\Modules\Infrastructure\Base\BaseAuthController;
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use PHPUnit\Framework\ExpectationFailedException;
use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class AuthController extends BaseAuthController
{
    public function __construct(
        private readonly AuthRequestTransformer $authRequestTransformer,
//        private readonly AuthSendMessageAction $authSendMessageAction,
    ) {
        parent::__construct();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
//    #[Route('/a', name: 'index_register', methods: ['GET'])]
//    public function index(): Response
//    {
//        return $this->sendPage('auth/index.html.twig', []);
//    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('reg/check_number', name: 'register_check_number', methods: ['POST'])]
    public function checkNumber(Request $request): Response
    {
        $dto = $this->authRequestTransformer->requestToCheckNumber($request);
//        $this->authSendMessageAction->execute($dto);
    }

}