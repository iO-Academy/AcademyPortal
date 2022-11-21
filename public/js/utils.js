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