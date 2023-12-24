import React from 'react';
import {Link} from "react-router-dom";

function QRCode() {
    return(
        <div /*className={QRCode.mainContainer}*/>
            <h1>Страница 1</h1>
            <Link to="/page2">Перейти на страницу 2</Link>
        </div>
    );
}
export default QRCode;