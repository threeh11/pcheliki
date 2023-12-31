import React, { Component, ChangeEvent } from 'react';
import { connect, ConnectedProps } from 'react-redux';
import { setCountry, setMethodAuth } from '../redux/actions';
import { AUTH_WITH_PHONE, AUTH_WITH_QR_CODE } from '../const/typesAuth';
import '../../styles/Register__CountryAndTelephone.scss';

interface RootState {
    isAuthQrCode: boolean;
    qrCode: string;
    phone: string;
    country: string;
    remember_me: boolean;
    methodAuth: number;
}

interface RootDispatch {
    setMethodAuthAction: (method: string) => void;
    setCountryAction: (country: string) => void;
}

type Props = ConnectedProps<typeof connector>;

class AuthComponent extends Component<Props, RootState> {
    state: RootState = {
        methodAuth: AUTH_WITH_QR_CODE,
    };

    componentDidMount() {
        //Тут надо будет сбегать за qr кодом..
        // getQrCode();
    }

    handleChangeMethodAuth = () => {
        if (this.state.methodAuth === AUTH_WITH_QR_CODE) {
            this.setState({
                methodAuth: AUTH_WITH_PHONE,
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

    render() {
        console.log(this.props);
        console.log(this.state);
        return (
            <>
                {this.state.methodAuth === AUTH_WITH_QR_CODE ? (
                    <>
                        {/*Тут будет Qr, пока думаю как его генерить*/}
                        <h1 className={'app__title__text'}>Log in to Telegram by QR Code</h1>
                        <div className={'app__title__container'}>
                            <div className={'app__title__container--list'}>
                <span>
                  <p className={'QR__description'}>
                    <strong className={'QR__description--listItem'}>1</strong>
                    Open Pchelogram on your phone
                  </p>
                </span>
                                <span>
                  <p className={'QR__description'}>
                    <strong className={'QR__description--listItem'}>2</strong>
                    Go to Settings > Devices > Link Desktop Device
                  </p>
                </span>
                                <span>
                  <p className={'QR__description'}>
                    <strong className={'QR__description--listItem'}>3</strong>
                    Point your phone at this screen to confirm login
                  </p>
                </span>
                                <button id={'changeButton'} className="favorite styled" type="button" onClick={this.handleChangeMethodAuth}>
                                    <p className={'QR__button'}>Log in by phone Number</p>
                                </button>
                            </div>
                        </div>
                    </>
                ) : (
                    <>
                        <div className={'mainContainer'}>
                            <div>
                                <div className={'logotype'}>
                                    <img
                                        src={'https://i.pinimg.com/originals/fe/bf/cc/febfcc493856e67733049fcd5827874d.jpg'}
                                        alt={'пчелограмий логотип'}
                                        className={'logotype__img'}
                                    />
                                </div>
                                <div className={'app__title'}>
                                    <p className={'app__title__text'}>Pchelogram</p>
                                </div>
                                <div className={'telephone__description'}>
                                    <p className={'telephone__description'}>Проверьте код страны и введите свой номер телефона</p>
                                </div>
                                <form method={'POST'} name={'form__CountryAndTelephone'} className={'form__onTelephone'} action={'reg/check_number'}>
                                    <select className={'form__country'} id={'country'} onChange={this.handleChangeSelectCountry}>
                                        <option defaultValue={'Russia'}>Russia</option>
                                        <option value={'RUSSIA'}>RUSSIA</option>
                                        <option value={'Russian Federation'}>Russian Federation</option>
                                    </select>
                                    <input className={'form__telephone'} id={'telephone'} type={'phone'}></input>
                                    <div className={'form__remember'}>
                                        <div>
                                            <input type={'checkbox'} id={'remember_me'} name={'remember_me'} className={'form__remember__checkbox'} />
                                        </div>
                                        <div>
                                            <p className={'telephone__description'}>remember me</p>
                                        </div>
                                    </div>
                                    <button type={'submit'} className={'form__CountryAndTelephone__button'}>
                                        Войти
                                    </button>
                                </form>
                                <button id={'changeButton'} className="favorite styled" type="button" onClick={this.handleChangeMethodAuth}>
                                    Вход по QR коду
                                </button>
                            </div>
                        </div>
                    </>
                )}
            </>
        );
    }
}

const mapStateToProps = (store: RootState) => {
    return {
        isAuthQrCode: store.isAuthQrCode,
        qrCode: store.qrCode,
        phone: store.phone,
        country: store.country,
        remember_me: store.remember_me,
    };
};

const mapDispatchToProps = (dispatch: RootDispatch) => {
    return {
        setMethodAuthAction: (method: string) => dispatch(setMethodAuth(method)),
        setCountryAction: (country: string) => dispatch(setCountry(country)),
    };
};

const connector = connect(mapStateToProps, mapDispatchToProps);

export default connector(AuthComponent);