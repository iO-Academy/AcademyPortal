function isDate(date) {
    let pattern = /([12]\d{3})-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])/
    if (pattern.test(date)) {
        return true
    } else {
        return false
    }
}

function isTime(time) {
    let pattern = /([01][0-9]|2[0-3]):[0-5][0-9]/
    if (pattern.test(time)) {
        return true
    } else {
        return false
    }
}


