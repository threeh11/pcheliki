import {SET_COUNTRY, SET_METHOD_AUTH} from "./typesActions";

export function setMethodAuth(method) {
    return {
        type: SET_METHOD_AUTH,
        payload: method,
    };
}

export function setCountry(country) {
    return {
        type: SET_COUNTRY,
        payload: country
    }
}
