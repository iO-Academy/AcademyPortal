let isValidEmail = (inputEmail) => {
    let email = inputEmail.trim()
    let regEx = new RegExp("^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$")
    return regEx.test(email)
}

let validateInputs = (cleanedEmailInput, cleanedPasswordInput) => {
    let userEmailWarning = document.getElementById('userEmailWarning')
    if (isValidEmail(cleanedEmailInput)) {
        userEmailWarning.classList.remove('error')
        return {'userEmail' : cleanedEmailInput, 'password': cleanedPasswordInput}
    } else {
        userEmailWarning.classList.add('error')
        document.getElementById('submitWarning').textContent = 'Field input error'
        return false
    }
}

let loginForm = document.getElementById('loginForm')
loginForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let response = false
    let cleanedEmailInput = encodeURI(document.getElementById('userEmail').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('password').value)
    let validInputs = validateInputs(cleanedEmailInput, cleanedPasswordInput)
    if (validInputs) {
        response = await jsonRequest('login', validInputs)
    }

    if (response && response['success'] === true){
        window.location.href = "/admin"
    } else {
        document.getElementById("error-message").innerText = response['msg'] || ''
    }

})