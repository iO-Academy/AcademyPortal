const eventForm = document.querySelector('form')
const message = document.querySelector('#messages')
// Submit Form + Add New Event API Call
eventForm.addEventListener("submit", e => {
    e.preventDefault()

    let data = getCompletedFormData()
    let validate = validateForm()
    if (validate) {
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
                    eventForm.elements['event-name'].value = '',
                    eventForm.elements['event-category'].value = '',
                    eventForm.elements['event-location'].value = '',
                    eventForm.elements['event-date'].value = '',
                    eventForm.elements['event-start-time'].value = '',
                    eventForm.elements['event-end-time'].value = '',
                    eventForm.elements['event-notes'].value = ''
                    message.innerText = responseJson.message
                    message.classList.add('alert-success')
                    message.classList.remove('alert-danger')
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
        name: eventForm.elements['event-name'].value,
        category: eventForm.elements['event-category'].value,
        availableToHP: eventForm.elements['available-to-HP'].checked ? 1 : 0,
        location: eventForm.elements['event-location'].value,
        date: eventForm.elements['event-date'].value,
        startTime: eventForm.elements['event-start-time'].value,
        endTime: eventForm.elements['event-end-time'].value,
        notes: eventForm.elements['event-notes'].value
    }
    return data
}

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
        if (required && maxLength != null && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>'
            success = false
        }
        //Checks an event is selected
        if (element.name === 'event-category' && element.value === '0') {
            message += 'Please select an event category!<br>'
            success = false
        }
        //Checks the date is in the format of a date 'YYYY-MM-DD'
        if (element.name === 'event-date') {
            let date = element.value.trim()
            if (!isDate(date)) {
                message += 'Invalid date!<br>'
                success = false
            }
        }
        //Checks the start time is in the format of a time 'HH:MM'
        if (element.name === 'event-start-time') {
            let time = element.value.trim()
            if (!isTime(time)) {
                message += 'Invalid start time!<br>'
                success = false
            }
        }
        // Checks the end time is in the format of a time 'HH:MM'
        if (element.name === 'event-end-time') {
            let time = element.value.trim()
            if (!isTime(time)) {
                message += 'Invalid end time!<br>'
                success = false
            }
        }
    })
    // check that the end time is actually after the start time
    // does not assume that times after midnight roll over to the next day
    let date = document.querySelector('#event-date').value
    let startTime = new Date(date + ' ' + document.querySelector('#event-start-time').value)
    let endTime = new Date(date + ' ' + document.querySelector('#event-end-time').value)
    if (endTime < startTime) {
        message += 'Event must not end before it begins.<br>'
        success = false
    } else if (endTime.getTime() == startTime.getTime()) {
        message += 'Event must not end at the same time it begins.<br>'
        success = false
    }

    //Adds all error messages to the messages div.
    document.getElementById('messages').innerHTML = message
    return success
}