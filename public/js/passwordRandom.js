
let getPasswordList = () => {
    const PASSWORDRANDOMURL = 'https://passwordwolf.com/api/?repeat=10'

    return fetch(PASSWORDRANDOMURL, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
        .then(res => res.json())
        .then(myJson => myJson)
        .catch(err => {
            console.log(`Looks like there was an error: ${err}`)
        })
}


let selectPassword = async () => {
   let passwords = await getPasswordList()

    if (typeof passwords ===  'object') {
        let password = await passwords[Math.floor(Math.random() * 9)]
        return password['password']
    }
}

let generatePassword = async () => {
    let password = await selectPassword()

    if (typeof password ===  'string') {
        console.log(password)
        return password
    }
}

let displayPassword = async () => {
    let messageBox = document.getElementById('randomPassword'),
        password = await generatePassword(),
        failMessage = 'PasswordWolf currently unavailable. Try refreshing or come back later.'

    password !== undefined ?
        messageBox.textContent = password : messageBox.textContent = failMessage
}

document.addEventListener('load', displayPassword)