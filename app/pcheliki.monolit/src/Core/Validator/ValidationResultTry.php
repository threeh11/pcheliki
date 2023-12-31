<?php

namespace App\Core\Validator;

use Symfony\Component\Validator\Exception\ValidatorException;

class ValidationResultTry implements IValidationResultTry
{
    private bool $isHasError;
    private array $errors;
    private array $data;

    public function __construct(
        bool $isHasError,
        array $errors,
        array $data,
    ) {
        $this->isHasError = $isHasError;
        $this->errors = $errors;
        $this->data = $data;
    }

    public static function createEmpty(): ValidationResultTry
    {
        return new ValidationResultTry(false, [], []);
    }

    public static function createWithError(array $errors): ValidationResultTry
    {
        return new ValidationResultTry(true, $errors, []);
    }

    public static function createWithoutError(array $data): ValidationResultTry
    {
        return new ValidationResultTry(false, [], $data);
    }

    //Пока прототип чтобы поработать с валидацией в Symfony,
    //Все равно потом ошибки будем по другому отдавать
    public function getValidDataOrThrowEx(): array
    {
        if ($this->isHasError && $this->errors) {
            $message = 'Ошибки валидации: ' . implode('', $this->errors);
            throw new ValidatorException($message);
        }
        return $this->data;
    }

}