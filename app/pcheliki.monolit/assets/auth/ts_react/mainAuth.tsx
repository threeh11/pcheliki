import React from 'react';
import ReactDOM from 'react-dom/client';
import AuthComponent from './components/AuthComponent';
import { BrowserRouter } from 'react-router-dom';
import { Provider } from 'react-redux';
import { rootReducers } from './redux/store/configureStore';
import {createStore} from 'redux';
// import { configureStore } from '@reduxjs/toolkit';

const rootElement: HTMLElement | null = document.getElementById('root');

if (!rootElement) {
    throw new Error('Не найдет root элемент, для построения приложения.')
}

ReactDOM.createRoot(rootElement).render(
    <Provider store={createStore(rootReducers)}>
        <BrowserRouter>
            <AuthComponent/>
        </BrowserRouter>
    </Provider>
);