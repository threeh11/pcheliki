<?php

namespace App\modules\Infrastructure\Validator;

use Symfony\Component\Validator\Constraint;

interface IValidatorService
{
    public function validateData(array $data, Constraint|array $constraint): ValidationResultTry;
}