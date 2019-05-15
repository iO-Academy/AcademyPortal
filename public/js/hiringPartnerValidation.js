



document.getElementById('hiringPartnerForm').addEventListener('submit', function (e) {
    e.preventDefault()
    validateForm();
})

function validateForm() {

    let message = ''
    let inputs = document.querySelectorAll('.submitHiringPartner')
    inputs.forEach(function (element) {
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.name + ' is a required field! <br>'
        }
        let maxLength = element.getAttribute('data-max')
        if (required && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>'
        }

        if (element.name === 'companySize' && element.value === '0') {
            message += 'Please select a company size!<br>'
        }

        if (element.name === 'postcode') {
            let postcode =  element.value.trim()
            let pattern = /\b((?:(?:gir)|(?:[a-pr-uwyz])(?:(?:[0-9](?:[a-hjkpstuw]|[0-9])?)|(?:[a-hk-y][0-9](?:[0-9]|[abehmnprv-y])?)))) ?([0-9][abd-hjlnp-uw-z]{2})\b/ig
            let regEx = new RegExp(pattern)
            if (!regEx.test(postcode)) {
                message += 'Invalid postcode!<br>'
            }
        }

        if (element.name === 'phoneNumber') {
            let phoneNumber =  element.value.trim()
            let pattern = /(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(phoneNumber)) {
                message += 'Invalid phone number format!<br>'
            }
        }

        if (element.name === 'companyUrl') {
            let url =  element.value.trim()
            let pattern = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(url)) {
                message += 'Invalid URL format!<br>'
            }
        }
    })



    document.getElementById('errors').innerHTML = message
}


///outputting error messages!