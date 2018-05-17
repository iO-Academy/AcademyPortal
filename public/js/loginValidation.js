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
    }
}

let jsonRequestCreator = async (path, data) => {
    let response =  await fetch(`/api/${path}`,
        {
            credentials: "same-origin",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(data => data.json())
        .then(function(data){return data})
    return response
}

let loginForm = document.getElementById('loginForm')
loginForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let cleanedEmailInput = encodeURI(document.getElementById('userEmail').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('password').value)
    let validInputs = validateInputs(cleanedEmailInput, cleanedPasswordInput),
        response = await jsonRequestCreator('login', validInputs)

    response['success'] === true ?
        window.location.href = "/admin"
        : document.getElementById("error-message").innerText = response['msg']
})