import { SET_COUNTRY, SET_METHOD_AUTH } from "./typesActions";

export function setMethodAuth(method: string) {
    return {
        type: SET_METHOD_AUTH,
        payload: method,
    };
}

export function setCountry(country: string) {
    return {
        type: SET_COUNTRY,
        payload: country
    }
}