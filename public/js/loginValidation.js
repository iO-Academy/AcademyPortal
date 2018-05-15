let isValidEmail = (elementID) => {
    let inputVal = document.getElementById(elementID)
    let userEmailWarning = document.getElementById('userEmailWarning')
    let email = inputVal.value.trim();
    let regexp = new RegExp("^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$")
    if (regexp.test(email)) {
        userEmailWarning.classList.remove('error')
        return true
    } else {
        userEmailWarning.classList.add('error')
        return false
    }
}

let validateInputs = () => {
    let cleanedEmailInput = encodeURI(document.getElementById('userEmail').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('password').value)

    if (isValidEmail('userEmail')) {
        let emailPasswordValues = {'email' : cleanedEmailInput, 'password': cleanedPasswordInput}
        return emailPasswordValues
    } else {
        document.getElementById('submitWarning').textContent = 'Field input error'
    }
}

let sendLoginDetails = (path, data) => {
    fetch(`/api/${path}`,
        {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(function(data){return data.json()})
}

let loginForm = document.getElementById('loginForm')
loginForm.addEventListener('submit', (e) => {
    let validInputs
    e.preventDefault()
    validInputs = validateInputs()
    sendLoginDetails(validInputs)
})
