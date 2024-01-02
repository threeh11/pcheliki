<?php

namespace App\Modules\Auth\Scenarios\Readers;

use App\Modules\Auth\Dto\DtoRequestCountriesForSelect;
use App\Modules\Infrastructure\Config\CfgPath;
use App\Modules\Infrastructure\Config\IConfigInteraction;

final readonly class AuthReaders
{
    public function __construct(
        private IConfigInteraction $configInteraction,
    ) {}

    public function getCountries(): array
    {
        $countriesCodesFromConfig = $this->configInteraction->item('countries_codes', CfgPath::COUNTRY_CODES);
        return DtoRequestCountriesForSelect::createFromArray($countriesCodesFromConfig);
    }
}