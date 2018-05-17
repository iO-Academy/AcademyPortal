const PASSWORDERRORMESSAGE = 'PasswordWolf currently unavailable. Try refreshing or come back later.'
let randomPassword

let errorMessage = (message, element) => {
    let messageBox = document.getElementById(element)

    messageBox.textContent = message
    messageBox.classList.add('alert')
}

let getPasswordList = (numberOfPasswords) => {
    const PASSWORDRANDOMURL = `https://passwordwolf.com/api/?repeat=${numberOfPasswords}`

    return fetch(PASSWORDRANDOMURL, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
        .then(res => res.json())
        .then(myJson => myJson)
        .catch(err => {
            errorMessage(PASSWORDERRORMESSAGE, 'randomPassword')
        })
}

let selectPassword = async () => {
   let passwords = await getPasswordList(10)

    if (typeof passwords ===  'object') {
        let password = await passwords[Math.floor(Math.random() * (passwords.length - 1))]
        return password['password']
    }
}

let generatePassword = async () => {
    let password = await selectPassword()

    if (typeof password ===  'string') {
        randomPassword = password
        return password
    }
}

let displayPassword = async () => {
    let messageBox = document.getElementById('randomPassword')
    let password = await generatePassword()

    if(password !== undefined) {
        messageBox.textContent = password
    } else {
        errorMessage()
    }
}

displayPassword();