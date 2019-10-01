document.getElementById('submit-event').addEventListener('click', e => {
    e.preventDefault()

    let data = getCompletedFormData()
    let validate = validateForm()
    if(validate) {
       console.log(data)
    }

})

function validateForm() {

    let success = true
    let message = ''
    let inputs = document.querySelectorAll('.create-events')
    inputs.forEach(function (element) {
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.previousElementSibling.innerHTML + ' is a required field! <br>'
            success = false
        }
        let maxLength = element.getAttribute('data-max')
        if (required && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>'
            success = false
        }

        if (element.name === 'event-category' && element.value === '0') {
            message += 'Please select an event category!<br>'
            success = false
        }

        if (element.name === 'event-date') {
            let date =  element.value.trim()
            let pattern = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/
            let regEx = new RegExp(pattern)
            if (!regEx.test(date)) {
                message += 'Invalid date!<br>'
                success = false
            }
        }

        if (element.name === 'event-start-time') {
            let date =  element.value.trim()
            let pattern = /([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/
            let regEx = new RegExp(pattern)
            if (!regEx.test(date)) {
                message += 'Invalid start time!<br>'
                success = false
            }
        }

        if (element.name === 'event-end-time') {
            let date =  element.value.trim()
            let pattern = /([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/
            let regEx = new RegExp(pattern)
            if (!regEx.test(date)) {
                message += 'Invalid end time!<br>'
                success = false
            }
        }

    })

    document.getElementById('messages').innerHTML = message

    return success
}

let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".create-events")
    let data = {}
    formData.forEach(formItem=> {
        data[formItem.name] = formItem.value
    })
    return data
}