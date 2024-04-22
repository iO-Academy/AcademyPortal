const addHiringPartnerForm = document.querySelector('#add-hiring-partner-form')
const message = document.querySelector('#add-hiring-partner-messages');

addHiringPartnerForm.addEventListener("submit", e => {
    e.preventDefault()
    const errorDivs = document.querySelectorAll('.alert');
    errorDivs.forEach(errorDiv => {
        errorDiv.classList.add('hidden');
    })


    let data = getCompletedFormData();
    let validatedFormItems = validateHpInputs(data);
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
                errorDiv.innerHTML = addHiringPartnerErrorMessage(key);
                formIsValid = false;
                message.classList.add('hidden')
                break;
            }
        }
    });

    if (formIsValid) {
        fetch('./api/createHiringPartner', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'post',
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(responseJson => {
                if (responseJson.success) {
                    addHiringPartnerForm.elements['company-name'].value = '',
                    addHiringPartnerForm.elements['company-size'].value = '',
                    addHiringPartnerForm.elements['company-tech-stack'].value = '',
                    addHiringPartnerForm.elements['company-postcode'].value = '',
                    addHiringPartnerForm.elements['company-phone-number'].value = '',
                    addHiringPartnerForm.elements['company-url'].value = '',
                    message.innerText = responseJson.message,
                    formSubmitSuccess(message)
                } else {
                    message.innerText = responseJson.message
                    message.classList.add('alert-danger')
                    message.classList.remove('alert-success')
                }
            })
    }
})

/**
 * Adds data from form into an object with the field name as key and the form value as value.
 */
let getCompletedFormData = () => {
    let data = {
        name: addHiringPartnerForm.elements['company-name'].value,
        companySize: addHiringPartnerForm.elements['company-size'].value,
        techStack: addHiringPartnerForm.elements['company-tech-stack'].value,
        postcode: addHiringPartnerForm.elements['company-postcode'].value,
        phoneNumber: addHiringPartnerForm.elements['company-phone-number'].value,
        companyUrl: addHiringPartnerForm.elements['company-url'].value
    }

    return data
}

let validateHpInputs = (data) => {
    validate = {
        name: {
            isPresent: isPresent(data.name),
            isName: isName(data.name),
            validLengthVarChar: varCharMaxLength(data.name)
        },
        companySize: {
            isPresent: isPresent(data.companySize)
        },
        techStack: {
            isPresent: isPresent(data.techStack),
            isName: isName(data.techStack),
            validLengthVarChar: varCharMaxLength(data.techStack)
        },
        postcode: {
            isPresent: isPresent(data.postcode),
            isPostcode: isPostcode(data.postcode),
            validLengthVarChar: varCharMaxLength(data.postcode)
        },
        phoneNumber: {
            isPresent: isPresent(data.phoneNumber),
            isPhoneNumber: isPhoneNumber(data.phoneNumber),
            validLengthVarChar: varCharMaxLength(data.phoneNumber)
        },
        companyUrl: {
            isPresent: isPresent(data.companyUrl),
            isUrl: isUrl(data.companyUrl),
            validTime: isUrl(data.companyUrl)
        },
    };
    return validate;
};

let addHiringPartnerErrorMessage = (validationType) => {
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
        case 'isPostcode':
            htmlString = `Please enter a valid postcode.`;
            break;
        case 'isPhoneNumber':
            htmlString = `Please enter a valid phone number.`;
            break;
        case 'isUrl':
            htmlString = 'Please enter a valid URL.'
        default:
            htmlString = `This field is invalid.`;
            break;
    }    
    return htmlString;
}

let addHiringPartner = async data => {
    fetch('./api/createHiringPartner', {
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
            document.getElementById('add-hiring-partner-form').reset()
            message.innerHTML = 'Hiring Partner successfully added.'
            formSubmitSuccess(message);
        } else {
            document.getElementById('add-hiring-partner-messages').innerHTML = '<p>Hiring Partner not added.</p>'
        }
    })
}