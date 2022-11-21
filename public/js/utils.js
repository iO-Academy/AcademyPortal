export const formSubmitSuccess = () => {
    message.classList.add('alert-success');
    message.classList.remove('alert-danger');
    setTimeout(() => {
        window.location.reload();
    }, 5000);
}