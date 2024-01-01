<?php

namespace App\Modules\Infrastructure\Config;

interface IConfigInteraction
{
    /*
     * @var CfgPath $path
     */
    public function item(string $name, string $path);
}