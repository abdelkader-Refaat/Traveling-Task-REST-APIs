
import './bootstrap';
import React from 'react';
import ReactDom from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';
import App from './components/App';



ReactDom.createRoot(document.getElementById('app')).render(

    <BrowserRouter>
        <App/>
    </BrowserRouter>




)

