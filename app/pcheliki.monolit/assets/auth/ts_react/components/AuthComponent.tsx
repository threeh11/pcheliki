import React, { Component, ChangeEvent } from 'react';
import { connect } from 'react-redux';
import {setCountry, setLoadedQrCode, setMethodAuth} from '../redux/actions';
import { AUTH_WITH_PHONE, AUTH_WITH_QR_CODE } from '../const/typesAuth';
import {getCountryAndCodesForSelect, getQrCodeForAuth} from '../actions/fetchs';
import {Throbber} from "../../../shared/ui/Throbber";
import QRcode from "../../../img/QRcode.svg";
import "../../../styles/app.scss";

interface AuthComponentProps {
    isLoadedQrCode: boolean;
    isLoadedCountriesCodes: boolean;
    isAuthQrCode: boolean;
    qrCode: string;
    phone: string;
    country: string;
    remember_me: boolean;
    setLoadedQrCodeAction: (isLoaded: boolean) => void;
    setMethodAuthAction: (method: number) => void;
    setCountryAction: (country: string) => void;
}

interface AuthComponentLocalState {
    methodAuth: number;
}

// Сложная вещь потом надо будет все это дело рефакторить, пока напишу на быструю руку
// чтобы бек можно было тестить
// По идее у этого компонента 4 состояния
// 1) Вход по qr коду
// 2) Вход по номеру
// 3) Подтверждение смс, и если не зареган ак то вводим имя и фамилию + лого
// 4) Если зареган, и если стоит облочный пароль то еще и его вводить
// Вообщем сложный компонент, возможно правильнее даже будет разбить на логически незавизимые компоненты
class AuthComponent extends Component<AuthComponentProps, AuthComponentLocalState> {
    constructor(props: AuthComponentProps) {
        super(props);
        this.state = {
            methodAuth: AUTH_WITH_QR_CODE,
        };
    }

    componentDidMount() {
        const countriesCodes = getCountryAndCodesForSelect();
        // Тут достаем qr-code
    }

    handleChangeMethodAuth = () => {
        getQrCodeForAuth();
        if (this.state.methodAuth === AUTH_WITH_QR_CODE) {
            this.setState({
                // тоже кринж меняю локальный стейт, а приходится задавать все стейты, тоже нужно будет разобраться
                methodAuth: AUTH_WITH_PHONE
            });
            this.props.setMethodAuthAction(AUTH_WITH_PHONE);
        } else {
            this.setState({
                methodAuth: AUTH_WITH_QR_CODE,
            });
            this.props.setMethodAuthAction(AUTH_WITH_QR_CODE);
        }
    };

    handleChangeSelectCountry = (e: ChangeEvent<HTMLSelectElement>) => {
        this.props.setCountryAction(e.target.value);
    };

    render(): JSX.Element {
        console.log(this.props);
        return (
            <>
                {this.state.methodAuth === AUTH_WITH_QR_CODE
                        ? (<>
                            <div className={'login-container'}>
                                {this.props.isLoadedQrCode ? (
                                    <img className={'login-container__image'} src={QRcode} alt="QR code"/>
                                ) : (
                                    <img className={'login-container__image'} src={QRcode} alt="QR code"/>
                                )}
                                <h1 className={'login-container__title'}>
                                    Log in to Telegram by QR Code
                                </h1>
                                <div className={'login-guide'}>
                                    <span>
                                        <div className={'index-box'}>
                                            <p className={'login-guide__index'}>
                                                1
                                            </p>
                                        </div>
                                        <p className={'login-guide__description'}>
                                            Open Pchelogram on your phone
                                        </p>
                                    </span>
                                    <span>
                                        <div className={'index-box'}>
                                            <p className={'login-guide__index'}>
                                                2
                                            </p>
                                        </div>
                                        <p className={'login-guide__description'}>
                                            Go to Settings {'>'} Devices {'>'} Link Desktop Device
                                        </p>
                                    </span>
                                    <span>
                                        <div className={'index-box'}>
                                            <p className={'login-guide__index'}>
                                                3
                                            </p>
                                        </div>
                                        <p className={'login-guide__description'}>
                                            Point your phone at this screen to confirm login
                                        </p>
                                    </span>
                                </div>
                                <div className={'buttons'}>
                                    <button className="buttons__switch-method" type="button"
                                            onClick={this.handleChangeMethodAuth}>
                                    Log in by phone Number
                                    </button>
                                    {/* добавить смену языка */}
                                    {/*<button id={'changeButton1'} className="favorite styled" type="button"*/}
                                    {/*        onClick={this.handleChangeMethodAuth}>*/}
                                    {/*    Продолжить на русском*/}
                                    {/*</button>*/}
                                </div>
                            </div>
                        </>
                    ) : (

                    )}
            </>
        );
    }
}

const mapStateToProps = (store: any) => {
    return {
        isLoadedQrCode: store.isLoadedQrCode,
        isLoadedCountriesCodes: store.isLoadedCountriesCodes,
        isAuthQrCode: store.isAuthQrCode,
        qrCode: store.qrCode,
        phone: store.phone,
        country: store.country,
        remember_me: store.remember_me,
    };
};

const mapDispatchToProps = (dispatch: any) => {
    return {
        setLoadedQrCode: (isLoaded: boolean) => dispatch(setLoadedQrCode(isLoaded)),
        setMethodAuthAction: (method: number) => dispatch(setMethodAuth(method)),
        setCountryAction: (country: string) => dispatch(setCountry(country)),
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(AuthComponent);