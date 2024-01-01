import {
    SET_PHONE,
    SET_QR_CODE,
    SET_COUNTRY,
    SET_METHOD_AUTH,
    SET_REMEMBER_ME
} from '../actions/typesActions';
import { AUTH_WITH_QR_CODE } from '../../const/typesAuth';

export interface AuthState {
    isAuthQrCode: number;
    qrCode: string | null;
    phone: string | null;
    country: string | null;
    remember_me: string | null;
}

const initialState: AuthState = {
    isAuthQrCode: AUTH_WITH_QR_CODE,
    qrCode: '',
    phone: '',
    country: '',
    remember_me: '',
}

export function authReducer(state: AuthState = initialState, action: any): AuthState {
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