<?php

namespace Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final readonly class ValidatorService implements IValidatorService
{
    public function __construct(
        private ValidatorInterface $validator
    ) {}

    // Пока прототип все рано улетит, так как там свои ошибки))
    public function validateData(array $data, Constraint|array $constraint): ValidationResultTry
    {
        if (!$data || !$constraint) {
            return ValidationResultTry::createEmpty();
        }

        $violations = $this->validator->validate($data, $constraint);
        if ($violations->count() > 0) {
            $errors = [];
            foreach ($violations as $violation) {
                $errors[] = $violation->getConstraint()->payload['label'] ?? null . ': ' . $violation->getMessage();
            }
            return ValidationResultTry::createWithError($errors);
        }

        return ValidationResultTry::createWithoutError($data);
    }

}