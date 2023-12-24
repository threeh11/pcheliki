import React from 'react';
import ReactDOM from 'react-dom/client';
import RegisterComponent from './components/AuthComponent';
import {BrowserRouter} from 'react-router-dom';
import {Provider} from 'react-redux';
import {store} from "./redux/store/configureStore";

const root = ReactDOM.createRoot(document.getElementById('root'));

root.render(
    <Provider store={store}>
        <BrowserRouter>
            <RegisterComponent/>
        </BrowserRouter>
    </Provider>
);
