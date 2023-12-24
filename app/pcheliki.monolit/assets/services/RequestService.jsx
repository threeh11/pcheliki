import {fetch} from 'whatwg-fetch';
import queryString from 'query-string';
import {AppError} from '../core/AppError';

class RequestService {
    constructor() {
        this.defaultHeaders = {
            Accept: 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
        };
    }

    async get(url, data = null) {
        const options = {
            method: 'GET',
            headers: {
                ...this.defaultHeaders,
            },
        };
        const response = await fetch(url + (data ? '?&' + queryString.stringify(data) : ''), options);
        if (response.ok) {
            return response.json();
        }
        await this.requestError(response);
    }

    async put(url, data, asJson = false) {
        const options = {
            method: 'PUT',
            headers: {
                ...this.defaultHeaders,
                'Content-Type': asJson ? 'application/json' : 'application/x-www-form-urlencoded',
            },
            body: asJson ? JSON.stringify(data) : queryString.stringify(data, {arrayFormat: 'bracket'}),
        };
        const response = await fetch(url, options,);
        if (response.ok) {
            return response.json();
        }
        await this.requestError(response);
    }

    async post(url, data, asJson = false) {
        const headers = {'Content-Type': asJson ? 'application/json' : 'application/x-www-form-urlencoded'};

        const preparedData = asJson
            ? JSON.stringify(data)
            : queryString.stringify(data, {arrayFormat: 'bracket'});

        return this.rawPost(url, preparedData, headers);
    }

    //Замечание: fetch из коробки умеет посылать инстансы FormData класса - поэтому суй без заголовков
    async rawPost(url, data, overwriteHeaders = {}) {
        const headers = {
            ...this.defaultHeaders,
            ...overwriteHeaders
        };

        const options = {
            method: 'POST',
            headers,
            body: data
        };

        const response = await fetch(url, options,);
        if (response.ok) {
            return response.json();
        }
        await this.requestError(response);
    }

    async delete(url, data = null) {
        const options = {
            method: 'DELETE',
            headers: {
                ...this.defaultHeaders,
            },
        };
        const response = await fetch(url + (data ? '?&' + queryString.stringify(data) : ''), options);
        if (response.ok) {
            return response.json();
        }
        await this.requestError(response);
    }

    async uploadOneFile(url, formDataObj) {
        const response = await fetch(url, {
            method: "POST",
            body: formDataObj
        });
        if (response.ok) {
            return response.json();
        }
        await this.requestError(response);
    }

    async requestError(response) {
        const res = await response.json();
        switch (response.status) {
            case 301:
                location.href = res.message;
                break;
            case 401:
                const currentHost = document.location.host;
                const requestHost = new URL(response.url).hostname;
                if (currentHost === requestHost) {
                    location.href = '/login';
                } else {
                    throw new AppError(this.prepareMessage(res), 401);
                }
                break;
            case 404:
                throw new AppError(this.prepareMessage(res), 404);
            case 403:
                throw new AppError(this.prepareMessage(res), 403);
            case 422:
                throw new AppError(this.prepareMessage(res), 422);
            default:
                throw new AppError('Ошибка на стороне сервера', 500);
        }
    }

    prepareMessage(res) {
        const message = res.message ? `<p>${res.message}</p>` : '';
        const errors = res.errors ? Object.keys(res.errors).map((errorKey) => `<p>${res.errors[errorKey]}</p>`).join(' ') : '';
        return message + errors;
    }

}

export default RequestService;
