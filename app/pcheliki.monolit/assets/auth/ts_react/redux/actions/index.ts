import {LOADED_SELECT_COUNTRIES, NOT_LOADED_SELECT_COUNTRIES, SET_COUNTRY, SET_METHOD_AUTH} from './typesActions';

export const setMethodAuth = (method: number) => ({
    type: SET_METHOD_AUTH,
    payload: method,
});

export const setCountry = (country: string) => ({
    type: SET_COUNTRY,
    payload: country,
});

export const setNotLoadedCountriesCodes = () => ({
    type: NOT_LOADED_SELECT_COUNTRIES,
    payload: false,
});

export const setIsLoadedCountriesCodes = () => ({
    type: LOADED_SELECT_COUNTRIES,
    payload: true,
});