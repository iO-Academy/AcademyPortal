document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()
    // Delete error messages existing on the page
    document.querySelectorAll('.errorMessage').forEach(field => field.remove())
    // Checking the field values if they are valid
    document.querySelectorAll('.eventInput').forEach(field => {
        if (field.dataset.required) {
            if (!validateRequired(field.value)) {
                insertErrorMessage(field, 'Required Field')
            }
        }

        if (field.dataset.date) {
            if (validateRequired(field.value) && !validateDate(field.value)) {
                insertErrorMessage(field, 'Date cannot be earlier than current date')
            }
        }

        if (field.dataset.time) {
            if (validateRequired(field.value) && !validateTime(field.value)) {
                insertErrorMessage(field, 'Please enter time in correct format HH:MM')
            }
        }

        if (field.dataset.endTime) {
            if (validateRequired(field.value) && validateTime(field.value) && !validateEndTime()) {
                insertErrorMessage(field, 'End time cannot be earlier than start time')
            }
        }
    })
})

/**
 * Function checks if given input's value empty or not
 * 
 * @param string input
 * 
 * @returns boolean
 */
function validateRequired(input) {
    return input !== ''
}

/**
 * Function inserts error messages after the given field
 * 
 * @param HTML element field
 * @param string message
 */
function insertErrorMessage(field, message) {
    field.insertAdjacentHTML('afterend', `<span class="errorMessage">** ${message}</span>`)
}

/**
 * Function validates if given date is earlier than today
 * 
 * @param string date
 * 
 * @returns boolean
 */
function validateDate(date) {
    const dateObj = new Date()
    const year = dateObj.getUTCFullYear()
    const month = dateObj.getUTCMonth() + 1
    const day = dateObj.getUTCDate()
    const fullDate = `${year}-${month}-${day}`
    return fullDate <= date;
}

/**
 * Function checks if endTime is later than startTime
 * 
 * @return boolean
 */
function validateEndTime() {
    const startTime = document.getElementById('startTime')
    const endTime = document.getElementById('endTime')
    return endTime.value > startTime.value;
}

/**
 * Function checks if the time given is in correct format
 * 
 * @param string time
 * 
 * @return boolean
 */
function validateTime(time) {
    const timeRegex = new RegExp('^([0-1][0-9]|[1-2][0-3]):([0-1][0-9]|[1-5][0-9])$', 'g')
    return timeRegex.test(time)
}