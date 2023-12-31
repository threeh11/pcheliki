import {
    SET_PHONE,
    SET_QR_CODE,
    SET_COUNTRY,
    SET_METHOD_AUTH,
    SET_REMEMBER_ME
} from '../actions/typesActions';
import { AUTH_WITH_QR_CODE } from "../../const/typesAuth";

export interface AuthState {
    isAuthQrCode: string;
    qrCode: string;
    phone: string;
    country: string;
    remember_me: string;
}

const initialState: { country: string; qrCode: string; isAuthQrCode: number; phone: string; remember_me: string } = {
    isAuthQrCode: AUTH_WITH_QR_CODE,
    qrCode: '',
    phone: '',
    country: '',
    remember_me: '',
}

export function authReducer(state: {
    country: string;
    qrCode: string;
    isAuthQrCode: number;
    phone: string;
    remember_me: string
} = initialState, action: any): {
    country: string;
    qrCode: any;
    isAuthQrCode: number;
    phone: string;
    remember_me: string
} {
    switch (action.type) {
        case SET_METHOD_AUTH:
            return {
                ...state,
                isAuthQrCode: action.payload
            };
        case SET_QR_CODE:
            return {
                ...state,
                qrCode: action.payload
            };
        case SET_PHONE:
            return {
                ...state,
                phone: action.payload
            };
        case SET_COUNTRY:
            return {
                ...state,
                country: action.payload
            };
        case SET_REMEMBER_ME:
            return {
                ...state,
                remember_me: action.payload
            };
        default:
            return state;
    }
}