import { combineReducers, Reducer } from 'redux';
import { authReducer, AuthState } from '../redusers/index';

interface RootState {
    authState: AuthState;
}

export const generatedReducers: Reducer<RootState> = combineReducers({
    authState: authReducer,
});
