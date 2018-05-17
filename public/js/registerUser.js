
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
    return response
}

let getInputs = () =>{
    let cleanedEmailInput = encodeURI(document.getElementById('emailNewUser').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('randomPassword').value)
    return {'email' : cleanedEmailInput, 'password' : cleanedPasswordInput}
}

let newUserForm = document.getElementById('registerUserForm')
newUserForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let data = getInputs(),
        messageBox = document.getElementById("message"),
        response = await sendNewUserDetails(data)

        if(!response['success']) {
            messageBox.innerText = 'Error adding user to database'
            messageBox.classList.add('error')
        } else if (response['success'] === true) {
            messageBox.innerText = `New user added email:' ${inputs['email']} ' password:' ${inputs['password']}'`
            messageBox.classList.remove('error')
        }
})