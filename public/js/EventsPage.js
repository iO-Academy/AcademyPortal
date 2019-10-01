//Adds event listener to submit button that gets data from form and validates it.
document.getElementById('submit-event').addEventListener('click', e => {
    e.preventDefault()
    let data = getCompletedFormData()
    let validate = validateForm()
    if (validate) {
        //This is where the object of the form data is sent if valid data.
        //It's console logged now for demonstration.
        console.log(data)
    }
})

/**
 * Adds data from form into an object with the field name as key and the form value as value.
 */
let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".create-events")
    let data = {}
    formData.forEach(formItem => {
        data[formItem.name] = formItem.value
    })
    return data
}

function validateForm() {
    let inputs = document.querySelectorAll('.create-events')
    inputs.forEach(function (element) {
        requiredFieldHasData(element)
        if (requiredFieldHasData(element)) {

        }
    }

    //Adds all error messages to the messages div.
    document.getElementById('messages').innerHTML = message
    return success
}

function requiredFieldHasData(element) {
    if (element.dataset.required && element.value.length < 1) {
        return {
            value: element.value,
            valid: false,
            message: element.previousElementSibling.innerHTML + ' is a required field! <br>'
        }
    } else {
        return {
            value: element.value,
            valid: true,
            message: ''
        }
    }
}

function dataIsWithinMaxLength(element) {
    if (element.value.length > element.dataset.max) {
        return {
            value: element.value,
            valid: false,
            message: element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>'
        }
    } else {
        return {
            value: element.value,
            valid: true,
            message: ''
        }
    }
}

function DropDownHasOptionSelected(element) {
    if (element.name === 'event-category' && element.value === '0') {
        return {
            value: element.value,
            valid: false,
            message: 'Please select an event category!<br>'
        }
    } else {
        return {
            value: element.value,
            valid: true,
            message: ''
        }
    }
}

function DateIsValid(element) {
    if (element.name === 'event-date') {
        let date = element.value.trim()
        let pattern = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/
        let regEx = new RegExp(pattern)
        if (!regEx.test(date)) {
            return {
                value: element.value,
                valid: false,
                message: 'Invalid date!<br>'
            }
        } else {
            return {
                value: element.value,
                valid: true,
                message: ''
            }
        }
    }
}

function startTimeIsValid(element) {
    if (element.name === 'event-start-time') {
        let date = element.value.trim()
        let pattern = /([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/
        let regEx = new RegExp(pattern)
        if (!regEx.test(date)) {
            return {
                value: element.value,
                valid: false,
                message: 'Invalid start time!<br>'
            }
        } else {
            return {
                value: element.value,
                valid: true,
                message: ''
            }
        }
    }
}

function endTimeIsValid(element) {
    if (element.name === 'event-end-time') {
        let date = element.value.trim()
        let pattern = /([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/
        let regEx = new RegExp(pattern)
        if (!regEx.test(date)) {
            return {
                value: element.value,
                valid: false,
                message: 'Invalid end time!<br>'
            }
        } else {
            return {
                value: element.value,
                valid: true,
                message: ''
            }
        }
    }
}