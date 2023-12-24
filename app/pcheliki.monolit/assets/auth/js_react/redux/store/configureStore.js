import { createStore } from 'redux';
import { rootReducer, initialState } from '../redusers/index';

export const store = createStore(rootReducer, initialState);