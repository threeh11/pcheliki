<?php

namespace App\modules\Auth\Scenarios\Others;

use App\modules\Auth\Dto\DtoRequestAuthCheckNumber;
use App\modules\Auth\Services\AuthValidatorBuilder;
use Symfony\Component\HttpFoundation\Request;

final readonly class AuthRequestTransformer
{
    public function __construct(
        private AuthValidatorBuilder $authValidatorBuilder
    ) {}

    public function requestToCheckNumber(Request $request): DtoRequestAuthCheckNumber
    {
        $notValidData = $request->request->all() ?: [];

        $validResult = $this->authValidatorBuilder->validateCheckNumber($notValidData);
        $validData = $validResult->getValidDataOrThrowEx();

        return new DtoRequestAuthCheckNumber(
            $validData['phone'],
            $validData['remember_me'],
        );
    }

}