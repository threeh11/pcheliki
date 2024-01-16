<?php

namespace App\Core\Validator;

interface IValidationResultTry
{
    //Нужно даже такое обрабатывать когда программист ошибся, но пока хз как
    public static function createEmpty(): ValidationResultTry;

    /** @param array<string> $errors */
    public static function createWithError(array $errors): ValidationResultTry;

    /** @param array<string> $data */
    public static function createWithoutError(array $data): ValidationResultTry;

    /** @return array<string> $data */
    public function getValidDataOrThrowEx(): array;
}