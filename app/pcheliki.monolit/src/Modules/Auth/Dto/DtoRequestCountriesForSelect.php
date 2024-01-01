<?php

namespace App\Modules\Auth\Dto;

final class DtoRequestCountriesForSelect
{
    public function __construct(
        public string $pathToCountryPic,
        public string $countryName,
        public string $phoneCodeCountry,
    ) {}

    public static function createFromArray(array $dataFrom): array
    {
        $dataDto = [];
        foreach ($dataFrom as $item) {
            $dataDto[] = new self(
                $item['path_to_country_pic'] ?? '',
                $item['country_name'] ?? '',
                $item['phone_code_country'] ?? '',
            );
        }
        return $dataDto;
    }

}