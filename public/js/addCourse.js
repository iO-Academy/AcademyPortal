const courseForm = document.querySelector('form');
const message = document.querySelector('#messages');
const in_person_checkbox = document.querySelector('#in_person');
const remote_checkbox = document.querySelector('#remote');
const in_person_spaces_input = document.querySelector('#in_person_spaces_input');
const remote_spaces_input = document.querySelector('#remote_spaces_input');
courseForm.addEventListener('change', () => {
    if (in_person_checkbox.checked) {
        in_person_spaces_input.classList.remove('hidden');
    } else {
        in_person_spaces_input.classList.add('hidden');
    }
})

courseForm.addEventListener('change', () => {
    if (remote_checkbox.checked) {
        remote_spaces_input.classList.remove('hidden');
    } else {
        remote_spaces_input.classList.add('hidden');
    }
})


// Submit Form + Add New Event API Call
courseForm.addEventListener('submit', e => {
    e.preventDefault()
    const errorDivs = document.querySelectorAll('.alert');
    errorDivs.forEach(errorDiv => {
        errorDiv.classList.add('hidden');
    })

    let data = getCompletedFormData();
    let validatedFormItems = validateCourseInputs(data);
    console.log(validatedFormItems)

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
        fetch('./api/addCourse', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'post',
            body: JSON.stringify(data)
        })
            .then(response => {
                return response.json()
            })
            .then(responseJson => {
                if (responseJson.success) {
                    courseForm.elements['courseName'].value = '',
                    courseForm.elements['startDate'].value = '',
                    courseForm.elements['endDate'].value = '',
                    courseForm.elements['notes'].value = '',
                    courseForm.elements['in_person'].checked = false,
                    courseForm.elements['remote'].checked = false,
                    message.innerText = responseJson.message,
                    selectedTrainerId = [],
                    courseForm.elements['trainer-checkbox'].forEach(trainer => {
                        trainer.checked = false;
                    })
                    formSubmitSuccess(message)
                } else {
                    message.innerText = responseJson.message
                    message.classList.add('alert-danger')
                    message.classList.remove('alert-success')
                }
            })
    }
});

let selectedTrainerId = []
/**
 * Retrieves trainer checkbox data from add course form
 * 
 * @returns array
 */
let getSelectedTrainers = () => {
    courseForm.elements['trainer-checkbox'].forEach(trainer => {
        if(trainer.checked){
            selectedTrainerId.push(trainer.dataset.id)  
        }  
    })
    return selectedTrainerId
}

/**
 * Adds data from form into an object with the field name as key and the form value as value.
 */
let getCompletedFormData = () => {
    let data = {
        courseName: courseForm.elements['courseName'].value,
        startDate: courseForm.elements['startDate'].value,
        endDate: courseForm.elements['endDate'].value,
        trainer: getSelectedTrainers(),
        notes: courseForm.elements['notes'].value,
        in_person: courseForm.elements['in_person'].checked ? 1 : 0,
        remote: courseForm.elements['remote'].checked ? 1 : 0,
        remote_input: courseForm.elements['remote_spaces_input'].value
    }

    if (data.in_person) {
        data.in_person_input = courseForm.elements['in_person_spaces_input'].value
    }

    return data;
}

let validateCourseInputs = (data) => {

    validate = {
        courseName: {
            isPresent: isPresent(data.courseName),
            isName: isName(data.courseName),
            validLengthVarChar: varCharMaxLength(data.courseName)
        },
        startDate: {
            isPresent: isPresent(data.startDate),
            isDate: isDate(data.startDate),
            validateEndDateLessThanStart: validateEndDateLessThanStart(data.startDate, data.endDate),
            validateEndDateSameAsStart: validateEndDateSameAsStart(data.startDate, data.endDate)
        },
        endDate: {
            isPresent: isPresent(data.endDate),
            isDate: isDate(data.endDate),
        },
        notes: {
            validLengthText: textAreaMaxLength(data.notes)
        },
        remote_input: {
            validInputSpacesAmount: validInputSpacesAmount(data.remote_input)

        }

    };

    if (data.in_person) {
        validate.in_person_input = {
            validInputSpacesAmount: validInputSpacesAmount(data.in_person_input)
        }
    }
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
        case 'validateEndDateLessThanStart':
            htmlString = 'Course must not end before it begins.';
            break;
        case 'validateEndDateSameAsStart':
            htmlString = 'Course must not end at the same date it begins.';
            break;
        case 'validInputSpacesAmount':
            htmlString = 'test.';
            break;
        default:
            htmlString = `This field is invalid.`;
            break;
    }
    return htmlString;
}
