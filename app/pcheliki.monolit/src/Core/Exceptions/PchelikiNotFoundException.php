<?php

namespace App\Core\Exceptions;

// Ошибку выдаем когда такого ресурса не существует
use Throwable;

class PchelikiNotFoundException extends \Exception
{
    public function __construct(string $message = "", int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}