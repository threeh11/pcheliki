import { SET_COUNTRY, SET_METHOD_AUTH } from './typesActions';

export const setMethodAuth = (method: number) => ({
    type: SET_METHOD_AUTH,
    payload: method,
});

export const setCountry = (country: string) => ({
    type: SET_COUNTRY,
    payload: country,
});