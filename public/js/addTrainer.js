const trainerForm = document.querySelector('form');
const message = document.querySelector('#messages');

// Submit Form + Add New Trainer API Call
trainerForm.addEventListener("submit", e => {
    e.preventDefault();

    let data = getCompletedTrainerFormData();
    let validate = validateTrainerInputs(data);
    let formIsValid = true;

    // document.querySelectorAll('.formItem_alert').forEach(element => {
    //     element.classList.remove('alert-danger');
    //     element.classList.add('hidden');
    //     element.innerHTML = '';
    // });

    //Error messages: need to add the correct classes : use for reference addApplicant form and saveApplicant.js
    
    Object.keys(validate).forEach(formItem => {
        console.log(formItem)
        const querySelector = document.querySelector(`#${formItem}Error`);
        let formItemValues = validate[formItem];

        Object.keys(formItemValues).forEach(validationType => {
            let isValid = formItemValues[validationType];
            if (!isValid) {
                querySelector.classList.add('alert-danger');
                querySelector.classList.remove('hidden');
                querySelector.innerHTML = errorMessage(validationType);
                formIsValid = false;
            }
        })
    });

    if (validate) {
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
                if (responseJson.success) {
                    trainerForm.elements['name'].value = '',
                    trainerForm.elements['email'].value = '',
                    trainerForm.elements['notes'].value = '',
                    message.innerText = responseJson.message,
                    message.classList.add('alert-success'),
                    message.classList.remove('alert-danger');
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

    validate = {
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
    console.log(validate)
    return validate;

};

function validateTrainerForm() {
    let success = true;
    let message = '';
    let inputs = document.querySelectorAll('.create-trainer');
    inputs.forEach(function (element) {


        //Checks fields with attribute data-required=true has data
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.name + ' is a required field! <br>';
            success = false;
        }
        //Checks fields with attribute data-max are within their character limit.
        let maxLength = element.getAttribute('data-max');
        if (required && maxLength != null && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>';
            success = false;
        }

    });
    //Adds all error messages to the messages div.
    document.getElementById('messages').innerHTML = message;
    return success;
}
