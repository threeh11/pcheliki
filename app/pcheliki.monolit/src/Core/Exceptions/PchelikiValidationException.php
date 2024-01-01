<?php

namespace App\Core\Exceptions;

use Throwable;

// Ошибка валидация, когда пользователь, дает не валиднные данные
class PchelikiValidationException extends \Exception
{
    // пока такой фунционал, будет пополнятся, когда потребуется

    private array $validationsErrors = [];

    public function __construct(
        string $message = "Ошибка валидации",
        int $code = 0,
        ?Throwable $previous = null,
        array $validationsErrors = [],
    ) {
        parent::__construct($message, $code, $previous);
        $this->validationsErrors = $validationsErrors;
    }

    public function getValidationErrors(): array
    {
        return $this->validationsErrors;
    }

    public function addValidationError(string $fieldName, string $errorMessage): void
    {
        $this->validationErrors[$fieldName] = $errorMessage;
    }
}