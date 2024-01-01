import { combineReducers } from 'redux';
import { authReducer } from '../redusers';

export const rootReducers = combineReducers({
    authState: authReducer,
});

export type RootState = ReturnType<typeof rootReducers>
