<?php

namespace App\Core\Exceptions;

use Throwable;

// у чела нету доступа к запрашиваемому ресурсу
class PchelikiAccessDeniedException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}