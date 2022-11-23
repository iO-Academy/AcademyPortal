const addHiringPartnerForm = document.querySelector('#add-hiring-partner-form')
const message = document.querySelector('#messages');

// Submit Form + Add New Event API Call
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
                errorDiv.innerHTML = errorMessage(key);
                formIsValid = false;
                message.classList.add('hidden')
                break;
            }
        }
    });

    if (formIsValid) {
        // send it!
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
                    addHiringPartnerForm.elements['company-url'].value = ''
                    message.innerText = responseJson.message
                    message.classList.add('alert-success')
                    message.classList.remove('alert-danger')
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
        companyName: addHiringPartnerForm.elements['company-name'].value,
        companySize: addHiringPartnerForm.elements['company-size'].value,
        techStack: addHiringPartnerForm.elements['company-tech-stack'].value,
        postcode: addHiringPartnerForm.elements['company-postcode'].value,
        phoneNumber: addHiringPartnerForm.elements['company-phone-number'].value,
        url: addHiringPartnerForm.elements['company-url'].value
    }

    return data
}


let validateHpInputs = (data) => {
    validate = {
        companyName: {
            isPresent: isPresent(data.companyName),
            isName: isName(data.companyName),
            validLengthVarChar: varCharMaxLength(data.companyName)
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
        url: {
            isPresent: isPresent(data.url),
            isUrl: isUrl(data.url),
            validTime: isUrl(data.url)
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