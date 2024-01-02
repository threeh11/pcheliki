import RequestService from '../../../core/services/RequestService';
import {store} from "../mainAuth";
import {setIsLoadedCountriesCodes, setNotLoadedCountriesCodes} from "../redux/actions";

export interface DataForCountrySelect {
    pathToCountryPic: string,
    countyName: string,
    phoneCodeCountry: string,
}

export const getCountryAndCodesForSelect = async (): Promise<DataForCountrySelect[]> => {
    //Так как мы еще не сгоняли за котами пока в стейте будем хранить что коды не загружены
    store.dispatch(setNotLoadedCountriesCodes());
    const requestService: RequestService = new RequestService();
    const { countries_codes } = await requestService.get('auth/get-countries');
    store.dispatch(setIsLoadedCountriesCodes());
    return countries_codes;
}