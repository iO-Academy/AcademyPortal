const addContactForm = document.querySelector('#add-contact-form')
const addContactResponseMessage = document.querySelector('#add-contact-messages')

// Submit Form + Add New Event API Call
addContactForm.addEventListener('submit', e => {
    e.preventDefault()
    const errorDivs = document.querySelectorAll('.alert');
    errorDivs.forEach(errorDiv => {
        errorDiv.classList.add('hidden');
    })

    let data = getCompletedFormData();
    let validatedFormItems = validateContactInputs(data);
    let formIsValid = true;

    Object.keys(validatedFormItems).forEach(formItemKey => {
        const errorDiv = document.querySelector(`#${formItemKey}Error`);
        let formItemValues = validatedFormItems[formItemKey];
        let keys = Object.keys(formItemValues);
        for (let i = 0; i < keys.length; i++) {
            let key = keys[i];
            let isValid = formItemValues[key];
            if (!isValid) {
                errorDiv.classList.add('alert-danger');
                errorDiv.classList.remove('hidden');
                errorDiv.innerHTML = errorMessage(key);
                formIsValid = false;
                addContactResponseMessage.classList.add('hidden')
                break;
            }
        }
    });

    if (formIsValid) {
        fetch('./api/addHiringPartnerContact', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'post',
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then( data => {
            if (data.success) {
                document.querySelector('#add-contact-form').reset()
                addContactResponseMessage.classList.add('alert-success')
                addContactResponseMessage.classList.remove('alert-danger')
                addContactResponseMessage.textContent = data.message
                formSubmitSuccess(addContactResponseMessage);
            }
        })
    }
})

let getCompletedFormData = () => {
    let data = {
        companyName: addContactForm['company'].value.trim(),
        contactName: addContactForm['contact-name'].value,
        contactEmail: addContactForm['contact-email'].value.trim(),
        contactJobTitle: addContactForm['contact-job-title'].value.trim(),
        contactPhoneNumber: addContactForm['contact-phone-number'].value.trim(),
        contactIsPrimary: addContactForm['contact-is-primary'].checked,
    }
    return data
}

let validateContactInputs = (data) => {
    validate = {
        companyName: {
            isPresent: isPresent(data.companyName),
            validLengthVarChar: varCharMaxLength(data.companyName)
        },
        contactName: {
            isPresent: isPresent(data.contactName),
            isName: isName(data.contactName),
            validLengthVarChar: varCharMaxLength(data.contactName)
        },
        contactEmail: {
            isPresent: isPresent(data.contactEmail),
            isEmail: isEmail(data.contactEmail),
            validLengthVarChar: varCharMaxLength(data.contactEmail)
        },
        contactJobTitle: {
            isPresent: isPresent(data.contactJobTitle),
            isName: isName(data.contactJobTitle),
            validLengthVarChar: varCharMaxLength(data.contactJobTitle)
        },
        contactPhoneNumber: {
            isPresent: isPresent(data.contactPhoneNumber),
            isPhoneNumber: isPhoneNumber(data.contactPhoneNumber),
            validLengthVarChar: varCharMaxLength(data.contactPhoneNumber)
        },
    };
    return validate;
};

let errorMessage = (validationType) => {
    let htmlString = '';

    switch (validationType) {
        case 'isPresent':
            htmlString = `This field must be filled in.`;
            break;
        case 'validLengthVarChar':
            htmlString = `This field must be less than 255 characters.`;
            break;
        case 'validLengthText':
            htmlString = `This field must be less than 5000 characters.`;
            break;
        case 'isName':
            htmlString = `Please use alphanumeric characters only.`;
            break;
        case 'isPhoneNumber':
            htmlString = `Please enter a valid phone number.`;
            break;
        case 'isEmail' :
            htmlString = `Please enter a valid email address.`;
            break;
        default:
            htmlString = `This field is invalid.`;
            break;
    }
    return htmlString;
}



