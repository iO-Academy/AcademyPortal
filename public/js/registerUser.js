const REGISTERERRORMESSAGE = 'Registration has failed. Please refresh the browser and try again'

let sendNewUserDetails = async (data) => {

    let response =  await fetch(`./api/registerUser`,
        {
            credentials: "same-origin",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
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
        response = await sendNewUserDetails(data),
        emailError = document.querySelector('#emailError')

    console.log(validateEmailInputs(data.email));

    messageBox.innerText = response['msg']
    if (response['success'] && validateEmailInputs(data.email)) {
        messageBox.classList.remove('alert-danger')
        messageBox.classList.add('alert-success')
        messageBox.innerText += '. A new password will be generated in 5 seconds.';
        setTimeout(() => {
            window.location.reload()
        }, 5000)
    } else {
        messageBox.classList.remove('alert-success')
        messageBox.classList.add('alert-danger')
        emailError.innerText = "This doesn't appear to be a valid email address. Please try again.";
        emailError.classList.add('alert-danger');
        emailError.classList.remove('hidden');
    }
})


// Copy and Paste Code from addTrainer.js for validating email and displaying error

let validateEmailInputs = (email) => {
    return varCharMaxLength(email) && isEmail(email) && isPresent(email);
};

let errorMessage = (validationType) => {
    let htmlString = '';
    switch (validationType) {
        case 'isEmail' :
            htmlString += `This doesn't appear to be a valid email address. Please try again.`;
            break;
    }
return htmlString;
};