import RequestService from '../../../core/services/RequestService';

interface DataForCountrySelect {
    pathToCountryPic: string,
    countyName: string,
    phoneCodeCountry: string,
}

export const getCountryAndCodesForSelect = (): DataForCountrySelect[] => {
    const requestService: RequestService = new RequestService();
    const {rows} = requestService.get('auth/get-countries');
    console.log(rows);
    return rows;
}