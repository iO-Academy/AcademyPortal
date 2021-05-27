function isDate(date) {
    let pattern = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
    return pattern.test(date);
}

function isTime(time) {
    let pattern = /([01][0-9]|2[0-3]):[0-5][0-9]/;
    return pattern.test(time);
}

function isName(name) {
    let pattern = /^[a-z ,.'-]+$/i;
    return pattern.test(name);
}

function isPhoneNumber(phone) {
    let regEx = /^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})$/;
    return regEx.test(phone);
}

function isEmail(email) {
    // email regex from http://emailregex.com - "Email Address Regular Expression That 99.99% Works."
    let regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regEx.test(email);
}

function isUrl(url) {
    let regEx = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/gm;
    return regEx.test(url);
}

function isPostcode(postcode) {
    let regEx = /\b((?:(?:gir)|(?:[a-pr-uwyz])(?:(?:[0-9](?:[a-hjkpstuw]|[0-9])?)|(?:[a-hk-y][0-9](?:[0-9]|[abehmnprv-y])?)))) ?([0-9][abd-hjlnp-uw-z]{2})\b/ig;
    return regEx.test(postcode);
}

function isPresent(data) {
        return (data !== "");
}

function textAreaMaxLength(data) {
    return data.length <= 10000;
}

function varCharMaxLength(data) {
    return data.length <= 255;
}
