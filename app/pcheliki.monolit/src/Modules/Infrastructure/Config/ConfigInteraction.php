<?php

namespace App\Modules\Infrastructure\Config;

final class ConfigInteraction implements IConfigInteraction
{
    // пока тоже тестово написано, потом будет доробатываться
    //, надо его вообще ексепшенами обложить похорошему
    public function item(string $name, string $path)
    {
        $pathToConfig = dirname(__DIR__, 4) . '/config/modules/' . $path . '.php';
        $configFile = include($pathToConfig);
        return $configFile[$name];
    }
}