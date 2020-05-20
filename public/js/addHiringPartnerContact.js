const addContactForm = document.querySelector('#add-contact-form')
const addContactResponseMessage = document.querySelector('#add-contact-messages')

addContactForm.addEventListener('submit', e => {
    e.preventDefault()

    let data = {
        contactName: addContactForm['contact-name'].value.trim(),
        contactCompanyId: addContactForm['company'].value,
        contactEmail: addContactForm['contact-email'].value.trim(),
        contactJobTitle: addContactForm['contact-job-title'].value.trim(),
        contactPhone: addContactForm['contact-phone-number'].value.trim(),
        contactIsPrimary: addContactForm['contact-is-primary'].checked,
    }

    if(validateAddContactForm(data)){
        fetch('./api/addContact', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'post',
            body: JSON.stringify(data)
        })
        .then( response => response.json())
        .then( data => {
            if (data.success) {
                document.querySelector('#add-contact-form').reset()
                addContactResponseMessage.classList.add('alert-success')
                addContactResponseMessage.classList.remove('alert-danger')
                addContactResponseMessage.textContent = data.message
            } else {
                addContactResponseMessage.classList.remove('alert-success')
                addContactResponseMessage.classList.add('alert-danger')
                addContactResponseMessage.textContent = data.message
            }
        })
    }
})

function validateAddContactForm(data) {
    let message = ''

    let validateCompany = function (company) {
        if (company == 0) {
            message += 'Contact Company is a required field!<br>'
            return false
        }
        let companySizes = document.querySelector('#company').childElementCount
        if (company > companySizes) {
            message += 'Invalid company option!<br>'
            return false
        }
        return true
    }(data.contactCompanyId)

    let validateName = function (name) {
        if (name.length < 1) {
            message += 'Contact Name is a required field!<br>'
            return false
        }
        if (name.length > 255) {
            message += 'Contact Name is too long!<br>'
            return false
        }
        return true
    }(data.contactName)

    let validateEmail = function (email) {
        if (email.length < 1) {
            message += 'Contact Email is a required field!<br>'
            return false
        }
        if (email.length > 255) {
            message += 'Contact Email is too long!<br>'
            return false
        }
        if (!isEmail(email)) {
            message += 'Invalid email format!<br>'
            return false
        }
        return true
    }(data.contactEmail)

    let validateJobTitle = function (jobTitle) {
        if (jobTitle.length > 255) {
            message += 'Contact Job Title is too long!<br>'
            return false
        }
        return true
    }(data.contactJobTitle)

    let validatePhoneNumber = function (phone) {
        if (phone.length == 0) {
            return true
        }
        if (phone.length > 20) {
            message += 'Contact Phone Number is too long!<br>'
            return false
        }
        if (!isPhoneNumber(phone)) {
            message += 'Invalid Phone Number format!<br>'
            return false
        }
        return true
    }(data.contactPhone)

    let validateIsPrimary = function (isPrimary) {
        if (!(isPrimary == 0 || isPrimary == 1)) {
            message += 'Primary Contact has an invalid value!<br>'
            return false
        }
        return true
    }(data.contactIsPrimary)

    if (message.length > 0) {
        addContactResponseMessage.classList.remove('alert-success')
        addContactResponseMessage.classList.add('alert-danger')
        addContactResponseMessage.innerHTML = message
        return false;
    }
    addContactResponseMessage.classList.remove('alert-success', 'alert-danger')
    return true;
}