<?php

namespace App\modules\Auth\Dto;

final class DtoRequestAuthCheckNumber
{
    public function __construct(
        public string $phone,
        public bool $rememberMe,
    ) {}
}