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
    let cleanedEmailInput = document.getElementById('emailNewUser').value
    let cleanedPasswordInput = document.getElementById('randomPassword').value
    return {'email' : cleanedEmailInput, 'password' : cleanedPasswordInput}
}

let newUserForm = document.getElementById('registerUserForm')
newUserForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let data = getInputs(),
        messageBox = document.getElementById('message'),
        button = document.getElementById('newUserSubmit'),
        response = await sendNewUserDetails(data)

    if(!response['success']) {
        messageBox.innerText = response['msg']
        messageBox.classList.add('error')
    } else if (response['success'] === true) {
        messageBox.innerText = response['msg']
        messageBox.classList.remove('error')
        button.style.display = 'none';
    }
})