document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()

    document.querySelector('.statusMessage').textContent = ''

    document.querySelectorAll('.error').forEach(function (error) {
        error.remove()
    })

    document.querySelectorAll('.formField').forEach(function (formField) {
        let field = formField.querySelector('.field')

        let error = document.createElement('span')
        error.classList.add('error')

        if (field.dataset.required) {
            if (!validateRequired(field.value)) {
                error.innerText += 'Field is required '
                formField.appendChild(error)
            }
        }
        if (field.dataset.postcode) {
            if (!validatePostcode(field.value)) {
                error.innerText += 'Invalid postcode'
                formField.appendChild(error)
            }
        }
    })

    if (!document.querySelector('.error')) {
        const formData = getFormData()
        sendRequest(formData)
    }
})

/**
 * Checks if input is blank
 *
 * @param input value of field to be checked
 * @returns {boolean} false if blank, else true
 */
function validateRequired(input) {
    return (input !== '')
}

/**
 * Checks if input is a valid postcode
 *
 * @param input value of field to be checked
 * @returns {boolean} true if valid postcode, else false
 */
function validatePostcode(input) {
    const re = /([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9][A-Za-z]?))))\s?[0-9][A-Za-z]{2})/
    return re.test(input)
}

/**
 * Retrieves values from form fields
 *
 * @returns {object} keys as field names & values as field values
 */
function getFormData() {
    let formData = {}
    const fieldWrappers = document.querySelectorAll(".formField")

    fieldWrappers.forEach(function(fieldWrapper) {
        let field = fieldWrapper.querySelector('.field')
        formData[field.name] = field.value
    })
    return formData
}

/**
 * Makes ajax request sending form data
 *
 * @param formData {object} values from form
 * @returns {Promise<any>} ajax response
 */
async function fetchData(formData) {
    let response = await fetch('/api/addHiringPartner', {
        method: 'post',
        body: JSON.stringify(formData),
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        }
    })
    return await response.json()
}

/**
 * Calls the ajax request and displays response/error message
 *
 * @param formData {object} values from form
 */
function sendRequest(formData) {
    fetchData(formData).then(function (data) {
        if (data.status) {
            document.querySelector('.statusMessage').textContent = 'Success!'
        } else {
            document.querySelector('.statusMessage').textContent = 'Server error.'
        }
    }).catch(function (err) {
        document.querySelector('.statusMessage').textContent = 'Ajax error: ' + err
    })
}