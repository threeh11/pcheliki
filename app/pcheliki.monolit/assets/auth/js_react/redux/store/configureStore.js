import {combineReducers} from 'redux';
import {authReducer} from '../redusers/index';

export const generatedReducers = combineReducers({
    authState: authReducer,
});