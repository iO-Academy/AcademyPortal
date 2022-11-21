const formSubmitSuccess = (elem) => {
    elem.classList.add('alert-success');
    elem.classList.remove('alert-danger');
    setTimeout(() => {
        window.location.reload();
    }, 5000);
}
