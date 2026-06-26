const getCsrfToken = () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    return csrfToken;
};

const httpPost = async (url, data) => {
    const csrfToken = getCsrfToken();
    const headers = {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrfToken,
    };
    const response = await fetch(url, {
        method: "POST",
        headers: headers,
        body: JSON.stringify(data),
    });
    const ress = await response.json();
    return ress;
};

const httpGetWithParams = async (url, withParams = {}) => {
    const queryString = new URLSearchParams(withParams).toString();
    const fullUrl = queryString ? `${url}?${queryString}` : url;
    const response = await fetch(fullUrl, {
        method: "GET",
        headers: {
            "Accept" : "application/json",
            "X-CSRF-TOKEN": getCsrfToken(),
        },
    });
    return response.json();
};

const httpGet = async (url) => {
    const response = await fetch(url, {
        method: "GET",
        headers: {
            "Accept" : "application/json",
            "X-CSRF-TOKEN": getCsrfToken(),
        },
    });
    const data = await response.json();
    return data;
};

export { httpPost, httpGet, getCsrfToken, httpGetWithParams };
