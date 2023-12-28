<?php

namespace App\Controller\Auth;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ApiAuthController
{
//    /**
//     * @throws TransportExceptionInterface
//     */
//    #[Route('reg/check_number', name: 'register_check_number', methods: ['POST'])]
//    public function checkNumber(Request $request): Response
//    {
//        $dto = $this->authRequestTransformer->requestToCheckNumber($request);
////        $this->authSendMessageAction->execute($dto);
//    }
}