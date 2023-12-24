import React from 'react';
import {connect} from 'react-redux';
import {setCountry, setMethodAuth} from '../redux/actions';
import {AUTH_WITH_PHONE, AUTH_WITH_QR_CODE} from '../const/typesAuth';
import '../../styles/Register__CountryAndTelephone.scss'
import {getQrCode} from "../redux/actions/fetchs";

class AuthComponent extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            methodAuth : AUTH_WITH_QR_CODE,
        }
        this.handleChangeMethodAuth = this.handleChangeMethodAuth.bind(this);
        this.handleChangeSelectCountry = this.handleChangeSelectCountry.bind(this);
    }

    componentDidMount() {
        //Тут надо будет сбегать за qr кодом..
        getQrCode();
    }

    handleChangeMethodAuth = () => {
        if (this.state.methodAuth === AUTH_WITH_QR_CODE) {
            this.setState({
                methodAuth: AUTH_WITH_PHONE
            });
            this.props.setMethodAuthAction(AUTH_WITH_PHONE)
        } else {
            this.setState({
                methodAuth: AUTH_WITH_QR_CODE
            });
            this.props.setMethodAuthAction(AUTH_WITH_QR_CODE)
        }
    };

    handleChangeSelectCountry = (e) => {
        this.props.setCountryAction(e.target.value)
    }

    render() {
        console.log(this.props);
        console.log(this.state);
        return(
            <>
                {
                    this.state.methodAuth === AUTH_WITH_QR_CODE
                        ? <>
                            {/*Тут будет Qr, пока думаю как его генерить*/}
                            <h1>Log in to Telegram by QR Code</h1>
                            <ol>
                                <span>
                                    <li>Open Telegram on your phone</li>
                                </span>
                                <span>
                                    <li>Go to Settings > Devices > Link Desktop Device</li>
                                </span>
                                <span>
                                    <li>Point your phone at this screen to confirm login</li>
                                </span>
                            </ol>
                            <button className="favorite styled" type="button"
                                onClick={this.handleChangeMethodAuth}>
                                Log in by phone Number
                            </button>
                        </>
                        :   <>
                                <div className={'mainContainer'}>
                                    <div>
                                        <div className={'logotype'}>
                                            <img src={'https://i.pinimg.com/originals/fe/bf/cc/febfcc493856e67733049fcd5827874d.jpg'}
                                                 alt={'пчелограмий логотип'}
                                                 className={'logotype__img'}/>
                                        </div>
                                        <div className={'app__title'}>
                                            <p className={'app__title__text'}>
                                                Pchelogram
                                            </p>
                                        </div>
                                        <div className={'telephone__description'}>
                                            <p className={'telephone__description'}>
                                                Проверьте код страны и введите свой номер телефона
                                            </p>
                                        </div>
                                        <form method={'POST'} name={'form__CountryAndTelephone'} className={'form__onTelephone'} action={'reg/check_number'}>
                                            <select className={'form__country'} id={'country'} onChange={this.handleChangeSelectCountry}>
                                                <option defaultValue={'Russia'}>Russia</option>
                                                <option value={'RUSSIA'}>RUSSIA</option>
                                                <option value={'Russian Federation'}>Russian Federation</option>
                                            </select>
                                            <input className={'form__telephone'} id={'telephone'} type={"phone"}></input>
                                            <div className={'form__remember'}>
                                                <input type={"checkbox"} id={"remember_me"} name={"remember_me"} className={'form__remember__checkbox'}/>
                                                <p className={'telephone__description'}>remember me</p>
                                            </div>
                                            <button type={"submit"} className={'form__CountryAndTelephone__button'}>
                                                Войти
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <button className="favorite styled" type="button"
                                        onClick={this.handleChangeMethodAuth}>
                                    Вход по Qr коду
                                </button>
                            </>
                }
            </>
        );
    }
}

const mapStateToProps = (store) => {
    return {
        isAuthQrCode: store.isAuthQrCode,
        qrCode: store.qrCode,
        phone: store.phone,
        country: store.country,
        remember_me: store.remember_me,
    };
};

const mapDispatchToProps = (dispatch) => {
    return {
        setMethodAuthAction: (method) => dispatch(setMethodAuth(method)),
        setCountryAction: (country) => dispatch(setCountry(country)),
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(AuthComponent);