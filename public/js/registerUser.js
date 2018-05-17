const REGISTERERRORMESSAGE = 'Registration has failed. Please refresh the browser and try again'

let sendNewUserDetails = async (data) => {

    let response =  await fetch(`/api/registerUser`,
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
        .catch(err => {
            errorMessage(REGISTERERRORMESSAGE, 'message')
        })
    return response
}

let getInputs = () =>{
    let cleanedEmailInput = encodeURI(document.getElementById('emailNewUser').value)
    let cleanedPasswordInput = encodeURI(randomPassword)
    return {'email' : cleanedEmailInput, 'password' : cleanedPasswordInput}
}

let newUserForm = document.getElementById('registerUserForm')
newUserForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let data = getInputs(),
        messageBox = document.getElementById('message'),
        response = await sendNewUserDetails(data)

    if(!response['success']) {
        messageBox.innerText = 'Error adding user to database'
        messageBox.classList.add('error')
    } else if (response['success'] === true) {
        messageBox.innerText = `New user added email:' ${data['email']} ' password:' ${data['password']} '`
        messageBox.classList.remove('error')
    }
    displayPassword();
})