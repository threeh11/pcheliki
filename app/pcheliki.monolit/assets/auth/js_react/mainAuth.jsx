import React from 'react';
import ReactDOM from 'react-dom/client';
import AuthComponent from './components/AuthComponent';
import {BrowserRouter} from 'react-router-dom';
import {Provider} from 'react-redux';
import {generatedReducers} from "./redux/store/configureStore";
import {createStore} from "redux";

ReactDOM.createRoot(document.getElementById('root')).render(
    <Provider store={
        createStore(generatedReducers,
            window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__())
    }>
        <BrowserRouter>
            <AuthComponent/>
        </BrowserRouter>
    </Provider>
);
