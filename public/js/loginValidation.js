let isValidEmail = (elementID) => {
    let inputVal = document.getElementById(elementID)
    let userEmailWarning = document.getElementById('userEmailWarning')
    let email = inputVal.value.trim();
    let regEx = new RegExp("^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$")
    if (regEx.test(email)) {
        userEmailWarning.classList.remove('error')
        return true
    } else {
        userEmailWarning.classList.add('error')
        return false
    }
}

let validateInputs = (cleanedEmailInput, cleanedPasswordInput) => {
    if (isValidEmail('userEmail')) {
        return {'userEmail' : cleanedEmailInput, 'password': cleanedPasswordInput}
    } else {
        document.getElementById('submitWarning').textContent = 'Field input error'
    }
}

let sendLoginDetails = async (path, data) => {
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
    console.log(response)
    return response
}

let loginForm = document.getElementById('loginForm')
loginForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let cleanedEmailInput = encodeURI(document.getElementById('userEmail').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('password').value)
    let validInputs = validateInputs(cleanedEmailInput, cleanedPasswordInput),
        response = await sendLoginDetails('login', validInputs)

    response['success'] === true ?
        window.location.href = "/admin"
        : document.getElementById("error-message").innerText = response['msg']
})