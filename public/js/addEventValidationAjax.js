document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()
    // Delete error messages existing on the page
    document.querySelectorAll('.errorMessage').forEach(field => field.remove())
    document.querySelectorAll('.eventInput').forEach(field => {
        if (field.dataset.required) {
            if (!validateRequired(field.value)) {
                insertErrorMessage(field, 'Required Field')
            }
        }

        if (field.dataset.date) {
            if (!validateDate(field.value)) {
                insertErrorMessage(field, 'Date cannot be earlier than current date')
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
    field.insertAdjacentHTML('afterend', `<div class="errorMessage">** ${message}</div>`)
}

function validateDate(date) {
    const dateObj = new Date()
    const year = dateObj.getUTCFullYear()
    const month = dateObj.getUTCMonth() + 1
    const day = dateObj.getUTCDate()
    const fullDate = `${year}-${month}-${day}`
    return fullDate <= date;
}