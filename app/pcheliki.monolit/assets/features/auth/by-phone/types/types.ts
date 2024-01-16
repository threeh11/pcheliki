import {ChangeEvent} from "react";


export type countriesArray = {
    countryName: string;
    phoneCodeCountry: string;
    pathToCountryPic: string;
}

export type propsForAuthByPhone = {
    isLoadedCountriesCodes: boolean;
    countriesCodes: countriesArray[];
    onHandleChangeSelectCountry: (e: ChangeEvent<HTMLSelectElement>) => void;
}