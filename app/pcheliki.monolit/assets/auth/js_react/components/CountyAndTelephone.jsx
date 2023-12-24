import React from 'react';
import {Link} from "react-router-dom";

function CountryAndTelephone(){
    return(
        <div className={'mainContainer'}>
            <div>
                <div className={'logotype'}>
                    <img src={'https://i.pinimg.com/originals/fe/bf/cc/febfcc493856e67733049fcd5827874d.jpg'}
                         alt={'пчелограмий логотип'}
                         className={'logotype__img'}/>
                    {/*<img src={'https://media.discordapp.net/attachments/1188115946150305823/1188208851951046713/soty.jpg?ex=6599b0ba&is=65873bba&hm=60d62b5fbfb01cb589a0e82a4b7e3d48c23b4219e5de0c033b3d54e4257cb1fc&=&format=webp'}*/}
                    {/*    alt={''}*/}
                    {/*    className={'logotype__img'}></img>*/}
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
                    <select className={'form__country'} id={'country'}>
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
    );
}
export default CountryAndTelephone;