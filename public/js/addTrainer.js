const trainerForm = document.querySelector('form');
const message = document.querySelector('#messages');
message.classList.add('hidden')

// Submit Form + Add New Trainer API Call
trainerForm.addEventListener("submit", e => {
    e.preventDefault();

    let data = getCompletedTrainerFormData();
    let validate = validateTrainerInputs(data);
    let formIsValid = true;

    document.querySelectorAll('.formItem_alert').forEach(element => {
        element.classList.remove('alert-danger');
        element.classList.add('hidden');
        element.innerHTML = '';
    });

    Object.keys(validate).forEach(formItem => {
        const querySelector = document.querySelector(`#${formItem}Error`);
        let formItemValues = validate[formItem];

        Object.keys(formItemValues).forEach(validationType => {
            let isValid = formItemValues[validationType];
            if (!isValid) {
                querySelector.classList.add('alert-danger');
                querySelector.classList.remove('hidden');
                querySelector.innerHTML = errorMessage(validationType);
                formIsValid = false;
                message.classList.add('hidden')
            }
        })
    });

    if (formIsValid) {
        fetch('/api/addTrainer', {
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
                message.classList.remove('hidden')
                if (responseJson.success) {
                    trainerForm.elements['name'].value = '',
                    trainerForm.elements['email'].value = '',
                    trainerForm.elements['notes'].value = '',
                    message.innerText = responseJson.message,
                    formSubmitSuccess(message);
                } else {
                    message.innerText = responseJson.message;
                    message.classList.add('alert-danger');
                    message.classList.remove('alert-success');
                }
            });
    }
});

/**
 * Adds data from form into an object with the field name as key and the form value as value.
 */
let getCompletedTrainerFormData = () => {
    let data = {
        name: trainerForm.elements['name'].value,
        email: trainerForm.elements['email'].value,
        notes: trainerForm.elements['notes'].value,
    }
    return data;
}

let validateTrainerInputs = (data) => {

    return {
        name: {
            validLengthVarChar: varCharMaxLength(data.name),
            isName: isName(data.name),
            isPresent: isPresent(data.name)
        },
        email: {
            validLengthVarChar: varCharMaxLength(data.email),
            isEmail: isEmail(data.email),
            isPresent: isPresent(data.email)
        },
        notes: {
            validLengthText: textAreaMaxLength(data.notes)
        }
    };
};

let errorMessage = (validationType) => {
    let htmlString = '';

    switch (validationType) {
        case 'validLengthVarChar' :
            htmlString += `This field must be less than 255 characters.`;
            break;
        case 'validLengthText':
            htmlString += `This field must be less than 5000 characters.`;
            break;
        case 'isName' :
            htmlString += `Please use alpha characters only.`;
            break;
        case 'isEmail' :
            htmlString += `This doesn't appear to be a valid email address. Please try again.`;
            break;
        case 'isPresent' :
            htmlString += `This field must be filled in.`;
            break;
        default:
            htmlString += `This field is invalid.`;
            break;
    }
    return htmlString;
};