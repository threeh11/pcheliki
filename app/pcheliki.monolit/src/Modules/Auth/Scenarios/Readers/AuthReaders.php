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
        $arrayForDto = [];
        $countriesCodesFromConfig = $this->configInteraction->item('countries_codes', CfgPath::COUNTRY_CODES);
        foreach ($countriesCodesFromConfig as $value) {
            $countryName = $value[0];
            $phoneCodeCountry = '+' . end($value);

            $arrayForDto[] = [
                'path_to_country_pic' => 'path',
                'country_name' => $countryName,
                'phone_code_country' => $phoneCodeCountry,
            ];
        }
        return DtoRequestCountriesForSelect::createFromArray($arrayForDto);
    }
}