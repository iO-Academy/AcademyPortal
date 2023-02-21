const eventForm = document.querySelector('form')
const message = document.querySelector('#messages');

// Submit Form + Add New Event API Call
eventForm.addEventListener("submit", e => {
    e.preventDefault()
    const errorDivs = document.querySelectorAll('.alert');
    errorDivs.forEach(errorDiv => {
        errorDiv.classList.add('hidden');
    })

    let data = getCompletedFormData();
    let validatedFormItems = validateEventInputs(data);
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
        fetch('./api/addEvent', {
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
                    eventForm.elements['event-category'].value = '',
                    eventForm.elements['event-name'].value = '',
                    eventForm.elements['event-date'].value = '',
                    eventForm.elements['event-location'].value = '',
                    eventForm.elements['event-start-time'].value = '',
                    eventForm.elements['event-end-time'].value = '',
                    eventForm.elements['event-notes'].value = ''
                    message.innerText = responseJson.message
                    formSubmitSuccess(message);
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
        category: eventForm.elements['event-category'].value,
        availableToHP: eventForm.elements['available-to-HP'].checked ? 1 : 0,
        name: eventForm.elements['event-name'].value,
        date: eventForm.elements['event-date'].value,
        location: eventForm.elements['event-location'].value,
        startTime: eventForm.elements['event-start-time'].value,
        endTime: eventForm.elements['event-end-time'].value,
        notes: eventForm.elements['event-notes'].value
    }

    return data
}

let validateEventInputs = (data) => {
    validate = {
        category: {
            isPresent: isPresent(data.category)
        },
        name: {
            isPresent: isPresent(data.name),
            isName: isName(data.name),
            validLengthVarChar: varCharMaxLength(data.name)
        },
        date: {
            validDate: isDate(data.date)
        },
        location: {
            isPresent: isPresent(data.location),
            isName: isName(data.eventName),
            validLengthVarChar: varCharMaxLength(data.location)
        },
        startTime: {
            validTime: isTime(data.startTime),
            // Force start and end time into date so the validators work correctly.
            validateEndLessThanStart: validateEndLessThanStart(new Date('2000-01-01 ' + data.startTime + ':00'), new Date('2000-01-01 ' + data.endTime +':00')),
            validateEndSameAsStart: validateEndSameAsStart(new Date('2000-01-01 ' + data.startTime + ':00'), new Date('2000-01-01 ' + data.endTime +':00'))
        },
        endTime: {
            validTime: isTime(data.endTime)
        },
        notes: {
            validLengthText: textAreaMaxLength(data.notes)
        }
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
        case 'isEmail':
            htmlString = `This doesn't appear to be a valid email address. Please try again.`;
            break;
        case 'validateEndLessThanStart':
            htmlString = 'Event must not end before it begins.';
            break;
        case 'validateEndSameAsStart':
            htmlString = 'Event must not end at the same time it begins.';
            break;
        default:
            htmlString = `This field is invalid.`;
            break;
    }
    return htmlString;
}
