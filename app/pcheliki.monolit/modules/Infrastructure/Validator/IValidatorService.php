<?php

namespace Validator;

use Symfony\Component\Validator\Constraint;

interface IValidatorService
{
    public function validateData(array $data, Constraint|array $constraint): ValidationResultTry;
}