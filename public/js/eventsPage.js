const eventList = document.querySelector('#events')
const eventForm = document.querySelector('form')
const message = document.querySelector('#messages')



/**
 * Gets event information from the API and passes into the
 * displayEventsHandler function
 *
 * @return event data
 */
function getEvents() {
    fetch('./api/getEvents', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then((eventInfo) => {
            displayEventsHandler(eventInfo.data)
        })
}

/**
 * Runs a foreach through each event object and outputs HTML elements with event details via eventGenerator
 *
 * @param events is an array of objects which contains information about events
 */
function displayEventsHandler(events) {
    let eventInformation = ''
    if (events == '') {
        eventList.innerHTML = 'No Events Scheduled'
    } else {
        eventList.innerHTML = ''

        events.forEach((event) => {
            
            eventGenerator(event)
                .then(() => {
                    let showInfoButtons = document.querySelectorAll('.show-event-info')
                    showInfoButtons.forEach(function (button) {
                        button.addEventListener('click', e => {
                            let targetId = 'moreInfo' + e.target.dataset.reference
                            let targetDiv = document.getElementById(targetId)
                            targetDiv.classList.toggle('hide')
                        })
                    })
                }).then(() => {
                const currentEventsMessage = document.querySelector(`#currentEventsMessages${event.id}`)
                let hpForms = document.querySelectorAll('.addHiringPartnerForm')
                hpForms.forEach(function (hpForm) {
                    hpForm.addEventListener('submit', function (e) {
                        e.preventDefault()
                        let eventIdForm = e.target.id
                        let hpId = document.querySelector(`select[data-event='${eventIdForm}']`).value
                        let attendees = document.querySelector(`[name='companyAttendees'][data-event='${eventIdForm}']`).value

                        if (attendees == "") {
                            attendees = null
                        }

                        let data = {
                            hiring_partner_id: hpId,
                            event_id: eventIdForm,
                            people_attending: attendees
                        }

                        if (attendees >= 0) {
                            if (hpId != 0) {
                                fetch('./api/addHiringPartnerToEvent', {
                                    credentials: 'same-origin',
                                    headers: {
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json',
                                    },
                                    method: 'post',
                                    body: JSON.stringify(data)
                                }).then(response => response.json())
                                    .then((responseJSON) => {
                                        currentEventsMessage.innerText = responseJSON.message
                                    })
                            } else {
                                currentEventsMessage.innerText = "Please select a hiring partner"
                            }
                        } else {
                            currentEventsMessage.innerText = "Please enter a valid number of attendees"
                        }
                    })
                })
            })
        })
    }
};

/**
 * Outputs HTML elements with event details
 *
 * @param events an object which contains information about an event
 */
async function eventGenerator(event) {
    // eventList.innerHTML = ''
    eventList.innerHTML += `<div id='currentEventsMessages${event.id}'></div>`
    const currentEventsMessage = document.querySelector(`#currentEventsMessages${event.id}`)
    let eventInformation = ''
    eventInformation +=
        `<div class="event-name">
            <p>${event.name}</p>
            <button class="show-event-info" data-reference='${event.id}'>More Info</button>
            <div id="moreInfo${event.id}" class="hide moreInfo">
            <p>Event Category: ${event.category_name}</p>
            <p>Date: ${new Date(event.date).toDateString()}</p>
            <p>Location: ${event.location}</p>
            <p>Start Time: ${event.start_time.slice(0, -3)}</p>
            <p>End Time: ${event.end_time.slice(0, -3)}</p>`

    if (event.notes !== null) {
        eventInformation += `<p>Notes: ${event.notes}</p>`
    }

    eventInformation += `<div class='addHiringPartner'>
            <form class='addHiringPartnerForm' id='${event.id}'>

            <select data-event=${event.id}>
            <option value='0'>Please select a hiring partner...</option>`

    await getHiringPartners().then(responseJson => {
        if (responseJson.status) {
            let hiringPartners = responseJson.data
            hiringPartners.forEach(function (hiringPartner) {
                eventInformation += "<option value='" + hiringPartner.id + "'>" + hiringPartner.name + "</option>"
            })
        } else {
            currentEventsMessage.innerText = responseJson.message
        }
    });

    eventInformation += `</select>
            <label>Number of company attendees:</label>
            <input data-event='${event.id}' type='number' name='companyAttendees' min='0'/>
            <input type='submit'/> 
            </form>
            </div>`

    eventInformation += `</div></div>`
    eventList.innerHTML += eventInformation
    return eventInformation
}

getEvents()

/**
 * Get all the hiring partners from the API
 *
 * @return array The JSON response
 */
async function getHiringPartners() {

    let response = await fetch('./api/getHiringPartnerInfo', {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'get',
    })
    return await response.json()
}

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
                    getEvents();
                } else {
                    message.innerText = responseJson.message
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