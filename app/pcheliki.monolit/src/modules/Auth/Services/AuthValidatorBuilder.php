<?php

namespace App\modules\Auth\Services;

use App\modules\Infrastructure\Validator\ValidationResultTry;
use App\modules\Infrastructure\Validator\ValidatorService;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class AuthValidatorBuilder
{
    public function __construct(
        private ValidatorService $validatorService,
    ) {}

    public function validateCheckNumber(array $notValidData): ValidationResultTry
    {
        $constraint = new Assert\Collection([
            'phone' => [
                new Assert\NotBlank([
                    'payload' => ['label' => 'Номер телефона'], //На счет лейблов не уверен нужно гуглить
                ]),
                new Assert\Type('string',),
            ],
            'remember_me' => [
                new Assert\NotBlank([
                    'payload' => ['label' => 'Запомнить меня'],
                ]),
                new Assert\Type('boolean'),
            ],
        ]);

        return $this->validatorService->validateData($notValidData, $constraint);
    }

}