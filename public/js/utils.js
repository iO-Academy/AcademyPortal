const formSubmitSuccess = (elem) => {
    elem.classList.add('alert-success');
    elem.classList.remove('alert-danger');
    elem.classList.remove('hidden');
    setTimeout(() => {
        window.location.reload();
    }, 5000);
}

const validateEmailInputs = (email) => {
    return varCharMaxLength(email) && isEmail(email) && isPresent(email);
};

const validateEndLessThanStart = (startTime, endTime) => {

    if (endTime < startTime) {
        return false
    }
    return true
};

const validateEndSameAsStart = (startTime, endTime) => {
    return endTime - startTime !== 0;
};

const validateEndDateLessThanStart = (startDate, endDate) => {

    if (endDate < startDate) {
        return false
    }
    return true
};

const validateEndDateSameAsStart = (startDate, endDate) => {

    return endDate !== startDate;
};