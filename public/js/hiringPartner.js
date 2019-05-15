
document.getElementById('submitHiringPartner').addEventListener('click', e => {
    e.preventDefault()

    let data = getCompletedFormData()
    let validate = validateForm()
    if(validate) {
        makeApiRequest(data)
    }
})

function validateForm() {

    let success = true
    let message = ''
    let inputs = document.querySelectorAll('.submitHiringPartner')
    inputs.forEach(function (element) {
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.name + ' is a required field! <br>'
            success = false
        }
        let maxLength = element.getAttribute('data-max')
        if (required && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>'
            success = false
        }

        if (element.name === 'companySize' && element.value === '0') {
            message += 'Please select a company size!<br>'
            success = false
        }

        if (element.name === 'postcode') {
            let postcode =  element.value.trim()
            let pattern = /\b((?:(?:gir)|(?:[a-pr-uwyz])(?:(?:[0-9](?:[a-hjkpstuw]|[0-9])?)|(?:[a-hk-y][0-9](?:[0-9]|[abehmnprv-y])?)))) ?([0-9][abd-hjlnp-uw-z]{2})\b/ig
            let regEx = new RegExp(pattern)
            if (!regEx.test(postcode)) {
                message += 'Invalid postcode!<br>'
                success = false
            }
        }

        if (element.name === 'phoneNumber') {
            let phoneNumber =  element.value.trim()
            let pattern = /^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})$/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(phoneNumber)) {
                message += 'Invalid phone number format!<br>'
                success = false
            }
        }

        if (element.name === 'companyUrl') {
            let url =  element.value.trim()
            let pattern = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(url)) {
                message += 'Invalid URL format!<br>'
                success = false
            }
        }
    })

    document.getElementById('messages').innerHTML = message

    return success
}

let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".submitHiringPartner")
    let data = {}
    formData.forEach(formItem=> {
        data[formItem.name] = formItem.value
    })
    return data
}

let makeApiRequest = async(data) => {
    return fetch('/api/createHiringPartner', {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'post',
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then((data) => {
            if (data.success) {
                document.getElementById('messages').innerHTML = '<p>Hiring Partner successfully added</p>'
            } else {
                document.getElementById('messages').innerHTML = '<p>Hiring Partner not added</p>'
            }
        })

}

