
document.getElementById("randomPassword").readOnly = true;

let sendNewUserDetails = async (path, data) => {

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
        .then(function(data){return data.json()})
        .then(function(data){return data})
    return response

}

let getInputs = () =>{
    let cleanedEmailInput = encodeURI(document.getElementById('emailNewUser').value)
    let cleanedPasswordInput = encodeURI(document.getElementById('randomPassword').value)
    let newUser= {'userEmail' : cleanedEmailInput, 'password' : cleanedPasswordInput}
    return newUser
}

let newUserForm = document.getElementById('registerUserForm')
newUserForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    let inputs = getInputs()
    let response = await sendNewUserDetails('registerUser', inputs)

    if(!response['success']) {
        document.getElementById("message").innerText = response['msg']
    } else if (response['success'] === true) {
        document.getElementById("message").innerText = `New user added email:${inputs['userEmail']} password:${inputs['password']}`;
    }
})
