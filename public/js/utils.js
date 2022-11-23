const formSubmitSuccess = () => {
    message.classList.add('alert-success');
    message.classList.remove('alert-danger');
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
