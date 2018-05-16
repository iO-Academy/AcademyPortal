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

let validateInputs = () => {
    let cleanedEmailInput = encodeURI(document.getElementById('userEmail').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('password').value)

    if (isValidEmail('userEmail')) {
        let emailPasswordValues = {'userEmail' : cleanedEmailInput, 'password': cleanedPasswordInput}
        return emailPasswordValues
    } else {
        document.getElementById('submitWarning').textContent = 'Field input error'
    }
}

let sendLoginDetails = async (path, data) => {

    let response =  await fetch(`/api/${path}`,
        {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(function(data){return data.json()})
        .catch(console.log('error'));
}

let loginForm = document.getElementById('loginForm')
loginForm.addEventListener('submit', (e) => {
    let validInputs
    e.preventDefault()
    validInputs = validateInputs()
    sendLoginDetails('login', validInputs)
})


// $app->post('/api/login', 'LoginController');