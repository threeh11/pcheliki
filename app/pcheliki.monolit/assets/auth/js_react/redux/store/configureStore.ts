import { combineReducers, Reducer } from 'redux';
import { authReducer, AuthState } from '../redusers';

interface RootState {
    authState: AuthState;
}

export const generatedReducers: Reducer<RootState> = combineReducers({
    authState: authReducer,
});
