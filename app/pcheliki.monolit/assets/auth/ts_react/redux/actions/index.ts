import {
    SET_COUNTRY,
    SET_METHOD_AUTH,
    IS_LOADED_QR_CODE,
    LOADED_SELECT_COUNTRIES,
    NOT_LOADED_SELECT_COUNTRIES
} from './typesActions';

export const setLoadedQrCode = (isLoaded: boolean) => ({
    type: IS_LOADED_QR_CODE,
    payload: isLoaded,
});

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