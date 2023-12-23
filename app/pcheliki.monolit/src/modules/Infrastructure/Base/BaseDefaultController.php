<?php

namespace App\modules\Infrastructure\Base;

abstract class BaseDefaultController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // Тут скорее всего всякие мидлеваре будут
    }

}