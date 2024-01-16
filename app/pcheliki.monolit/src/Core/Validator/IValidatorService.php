<?php

namespace App\Core\Validator;

use Symfony\Component\Validator\Constraint;

interface IValidatorService
{
    /**
     * @param array<string> $data
     * @param Constraint|array<string> $constraint
     */
    public function validateData(array $data, Constraint|array $constraint): ValidationResultTry;
}