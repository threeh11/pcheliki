import React, { FC, useState } from 'react';
import {Throbber} from "../../../../shared/ui/Throbber";
import {propsForAuthByPhone} from "../types/types";

const AuthByPhoneComponent: FC<propsForAuthByPhone> = ({ isLoadedCountriesCodes, countriesCodes }) => {

    const handleChangeSelectCountry = (event): void => {
        this.props.onHandleChangeSelectCountry(event.target.value)
    }

    return (
        <div className={'login-container'}>
            <img src={'https://i.pinimg.com/originals/fe/bf/cc/febfcc493856e67733049fcd5827874d.jpg'}
                 alt={'пчелограмий логотип'} className={'login-container__logo'}/>
            <h1 className={'login-container__title'}>
                Pchelogram
            </h1>
            <p className={'login-container__description'}>Please confirm your country number and enter
                your phone number</p>
            <form method={'POST'} name={'form__CountryAndTelephone'}
                  className={'login-form'} action={'reg/check_number'}>
                {isLoadedCountriesCodes
                    ? (<>
                            <select className={'login-form__select'} id={'country'}
                                    onChange={handleChangeSelectCountry}>
                                <option></option>
                            </select>
                        </>
                    ) : (
                        <Throbber size={'lg'}></Throbber>
                    )}

                <input className={'login-form__input'} id={'telephone'}
                       type={'phone'}></input>
                <div className={'form-checkbox'}>
                    <input type={'checkbox'} id={'remember_me'} name={'remember_me'}
                           className={'form-checkbox__flag'}/>
                    <p className={'form-checkbox__sign'}>Keep me sign in</p>
                </div>
                <button type={'submit'} className={'login-form__button'}>
                    Log in
                </button>
            </form>
            <button id={'changeButton'} className="login-container__button" type="button"
                    onClick={this.handleChangeMethodAuth}>
                Log in with QR Code
            </button>
        </div>
    )
}