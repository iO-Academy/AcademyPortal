const trainerForm = document.querySelector('form');
const message = document.querySelector('#messages');

// Submit Form + Add New Trainer API Call
trainerForm.addEventListener("submit", e => {
    e.preventDefault();

    let data = getCompletedTrainerFormData();
    let validate = validateTrainerForm();
    console.log(validate)
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

function validateTrainerForm() {
    let success = true;
    let message = '';
    let inputs = document.querySelectorAll('.create-trainer');
    inputs.forEach(function (element) {
        //Checks fields with attribute data-required=true has data
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.previousElementSibling.innerHTML + ' is a required field! <br>';
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