<?php

namespace App\Core\Exceptions;

use AllowDynamicProperties;
use stdClass;
use Throwable;

// Ошибка валидация, когда пользователь, дает не валиднные данные
#[AllowDynamicProperties] // - Вот про эту тему надо почитать, на 43 строчку ругается phpStan, а вот эта штука ее снимает
/** @property-write stdClass $validationsErrors */
class PchelikiValidationException extends \Exception
{
    // пока такой фунционал, будет пополнятся, когда потребуется

    /* @var array<string> $validationsErrors */
     private array $validationsErrors;

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param array<string> $validationsErrors
     */
    public function __construct(
        string $message = "Ошибка валидации",
        int $code = 422,
        ?Throwable $previous = null,
        array $validationsErrors = [],
    ) {
        parent::__construct($message, $code, $previous);
        $this->validationsErrors = $validationsErrors;
    }

    /**
     * @return array<string> $validationsErrors
     */
    public function getValidationErrors(): array
    {
        return $this->validationsErrors;
    }

    public function addValidationError(string $fieldName, string $errorMessage): void
    {
        $this->validationErrors[$fieldName] = $errorMessage;
    }
}