
document.getElementById("randomPassword").readOnly = true;

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
        .then(function(data){return data})
    console.log(response)
    return response
}

let getInputs = () =>{
    let cleanedEmailInput = encodeURI(document.getElementById('emailNewUser').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('randomPassword').value)
    return {'userEmail' : cleanedEmailInput, 'password' : cleanedPasswordInput}
}

let newUserForm = document.getElementById('registerUserForm')
newUserForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let inputs = getInputs()
    let response = await sendNewUserDetails(inputs)
    let messageBox = document.getElementById("message")

    if(!response['success']) {
        messageBox.innerText = 'Error adding user to database'
        messageBox.classList.add('error')
    } else if (response['success'] === true) {
        messageBox.innerText = `New user added email:${inputs['userEmail']} password:${inputs['password']}`
        messageBox.classList.remove('error')
    }
})
