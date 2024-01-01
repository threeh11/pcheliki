import RequestService from '../../../core/services/RequestService';

interface DataForCountrySelect {
    pathToCountryPic: string,
    countyName: string,
    phoneCodeCountry: string,
}

export const getCountryAndCodesForSelect = async (): Promise<DataForCountrySelect[]> => {
    const requestService: RequestService = new RequestService();
    const {countries_codes, count} = await requestService.get('auth/get-countries');
    return countries_codes;
}