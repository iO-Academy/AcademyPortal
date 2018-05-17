let errorMessage = () => {
    let messageBox = document.getElementById('randomPassword')

    messageBox.textContent = 'PasswordWolf currently unavailable. Try refreshing or come back later.'
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
            errorMessage()
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
        return password
    }
}

let displayPassword = async () => {
    let messageBox = document.getElementById('randomPassword')
    messageBox.readOnly = true
    let password = await generatePassword()

    if(password !== undefined) {
        messageBox.value = password
    } else {
        errorMessage()
    }
}

displayPassword();