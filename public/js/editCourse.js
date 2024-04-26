const courseForm = document.querySelector('form');
const message = document.querySelector('#messages');
const in_person_radio = document.querySelector('#in_person');
const remote_radio = document.querySelector('#remote');
const in_person_spaces = document.querySelector('#in_person_spaces');
const remote_spaces = document.querySelector('#remote_spaces');
const courseCategory = document.querySelector('#courseCategory');


in_person_radio.addEventListener('click', () => {
    in_person_spaces.classList.toggle('hidden');
    remote_spaces.classList.toggle('hidden')});
remote_radio.addEventListener('click', () => {
    in_person_spaces.classList.toggle('hidden');
    remote_spaces.classList.toggle('hidden')});


// Submit Form + Add New Event API Call
courseForm.addEventListener('submit', e => {
    e.preventDefault()
    const errorDivs = document.querySelectorAll('.alert');
    errorDivs.forEach(errorDiv => {
        errorDiv.classList.add('hidden');
    })

    let data = getCompletedFormData();
    let validatedFormItems = validateCourseInputs(data);

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
                message.classList.add('hidden');
                break;
            }
        }
    });

    let route = '/api/editCourse';
    if (formIsValid) {
        // send it!
        fetch(route, {
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
                        courseForm.elements['in_person_spaces'].value = '',
                        courseForm.elements['remote_spaces'].value = '',
                        courseForm.elements['courseCategory'].value = '',
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
                    message.classList.remove('hidden')
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
    let selectedTrainerId = []
    courseForm.elements['trainer-checkbox'].forEach(trainer => {
        if (trainer.checked) {
            selectedTrainerId.push(trainer.dataset.id)
        }
    })
    return selectedTrainerId
}

/**
 * Adds data from form into an object with the field name as key and the form value as value.
 */
let getCompletedFormData = () => {
    return {
        courseName: courseForm.elements['courseName'].value,
        startDate: courseForm.elements['startDate'].value,
        endDate: courseForm.elements['endDate'].value,
        trainer: getSelectedTrainers(),
        notes: courseForm.elements['notes'].value,
        in_person: courseForm.elements['in_person'].checked ? 1 : 0,
        remote: courseForm.elements['remote'].checked ? 1 : 0,
        in_person_spaces: courseForm.elements['in_person'].checked ? courseForm.elements['in_person_spaces'].value : null,
        remote_spaces: courseForm.elements['remote'].checked ? courseForm.elements['remote_spaces'].value : null,
        courseCategory: courseForm.elements['courseCategory'].value,
        editOrAdd: courseForm.elements['editOrAdd'].value,
        id: courseForm.elements['id'].value
    };
}

let validateCourseInputs = (data) => {

    validate = {
        courseName: {
            isPresent: isPresent(data.courseName),
            isName: isName(data.courseName),
            validLengthVarChar: varCharMaxLength(data.courseName)
        },
        courseCategory: {
            isPresent: isPresent(data.courseCategory)
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
    };
    if (data.in_person) {
        validate.in_person_spaces = {
            validInputSpacesAmount: validInputSpacesAmount(data.in_person_spaces)
        }
    }
    if (data.remote) {
        validate.remote_spaces = {
            validInputSpacesAmount: validInputSpacesAmount(data.remote_spaces)
        }
    }
    return validate;
};
