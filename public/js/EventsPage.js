//Adds event listener to submit button that gets data from form and validates it.
document.getElementById('submit-event').addEventListener('click', e => {
    e.preventDefault()
    let data = getCompletedFormData()
    let validate = validateForm()
    if(validate) {
        //This is where the object of the form data is sent if valid data.
        //It's console logged now for demonstration.
       console.log(data)
    }
})

function validateForm() {
    let success = true
    let message = ''
    let inputs = document.querySelectorAll('.create-events')
    inputs.forEach(function (element) {
        //Checks fields with attribute data-required=true has data
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.previousElementSibling.innerHTML + ' is a required field! <br>'
            success = false
        }
        //Checks fields with attribute data-max are within their character limit.
        let maxLength = element.getAttribute('data-max')
        if (required && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>'
            success = false
        }
        //Checks an event is selected
        if (element.name === 'event-category' && element.value === '0') {
            message += 'Please select an event category!<br>'
            success = false
        }
        //Checks the date is in the format of a date
        if (element.name === 'event-date') {
            let date =  element.value.trim()
            let pattern = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/
            let regEx = new RegExp(pattern)
            if (!regEx.test(date)) {
                message += 'Invalid date!<br>'
                success = false
            }
        }
        //Checks the start time is in the format of a time
        if (element.name === 'event-start-time') {
            let date =  element.value.trim()
            let pattern = /([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/
            let regEx = new RegExp(pattern)
            if (!regEx.test(date)) {
                message += 'Invalid start time!<br>'
                success = false
            }
        }
        //Checks the end time is in the format of a time
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
    //Adds all error messages to the messages div.
    document.getElementById('messages').innerHTML = message
    return success
}
//Adds data from form into an object with the field name as key and the form value as value.
let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".create-events")
    let data = {}
    formData.forEach(formItem=> {
        data[formItem.name] = formItem.value
    })
    return data
}