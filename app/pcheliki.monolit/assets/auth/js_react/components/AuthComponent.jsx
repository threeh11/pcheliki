import React from 'react';
import QRCode from "./QRCode";
import CountyAndTelephone from "./CountyAndTelephone";
import { Routes, Route, Link } from 'react-router-dom';
import {connect} from "react-redux";

class AuthComponent extends React.Component {
    constructor(props) {
        super(props);
    }

    componentDidMount() {

    }

    render() {
        return(
            <>
                <Routes>
                    <Route exact path="/page1" element={<QRCode/>} />
                    <Route exact path="/page2" element={<CountyAndTelephone/>} />
                </Routes>
            </>
        );
    }
}

const mapStateToProps = (store) => {
    console.log(store);
    return {
        qrCode: store.qrCode,
        phone: store.phone,
        country: store.country,
    };
};

export default connect(mapStateToProps)(AuthComponent);