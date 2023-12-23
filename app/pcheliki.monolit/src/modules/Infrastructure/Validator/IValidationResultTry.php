<?php

namespace App\modules\Infrastructure\Validator;

interface IValidationResultTry
{
    //Нужно даже такое обрабатывать когда программист ошибся, но пока хз как
    public static function createEmpty(): ValidationResultTry;

    public static function createWithError(array $errors): ValidationResultTry;

    public static function createWithoutError(array $data): ValidationResultTry;

    public function getValidDataOrThrowEx(): array;
}