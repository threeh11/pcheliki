<?php

namespace App\Modules\Auth\Dto;

final class DtoRequestAuthCheckNumber
{
    public function __construct(
        public string $phone,
        public bool $rememberMe,
    ) {}
}