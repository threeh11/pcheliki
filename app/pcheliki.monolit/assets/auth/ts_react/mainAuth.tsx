import React from 'react';
import ReactDOM from 'react-dom/client';
import AuthComponent from './components/AuthComponent';
import { BrowserRouter } from 'react-router-dom';
import { Provider } from 'react-redux';
import { rootReducers } from './redux/store/configureStore';
import {compose, createStore} from 'redux';

// отладочная вещь, на проде надо будет убрать
// TODO добавить проверку на env=prod или dev
declare global {
    interface Window {
        __REDUX_DEVTOOLS_EXTENSION_COMPOSE__?: typeof compose;
    }
}
const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
const store = createStore(rootReducers, composeEnhancers());

const rootElement: HTMLElement | null = document.getElementById('root');

if (!rootElement) {
    throw new Error('Не найдет root элемент, для построения приложения.')
}

ReactDOM.createRoot(rootElement).render(
    <Provider store={store}>
        <BrowserRouter>
            <AuthComponent/>
        </BrowserRouter>
    </Provider>
);