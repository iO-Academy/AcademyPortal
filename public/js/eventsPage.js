const eventList = document.querySelector('#events')
const message = document.querySelector('#messages')
const isPastPage = document.querySelector('#events-list').dataset.eventType === 'Past'; // this is such a hack!

import {displayApplicantModal} from "./applicantModal.js"

/**
 * Gets event information from the API and passes into the
 * displayEventsHandler function
 *
 * @return event data
 */
function getEvents(search = false) {

    let url = './api/getEvents?'
    if (search !== false) {
        url += 'searchTerm=' + search
    }

    if (isPastPage) {
        url += '&past=1'
    }

    fetch(url, {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(async (eventInfo) => {
        let hiringPartners = await getHiringPartners();
        let applicants = await getAssessmentApplicants();
        return {events: eventInfo, hiringPartners: hiringPartners, applicants: applicants};
    })
    .then(eventsAndHiringPartners => {
        displayEventsHandler(eventsAndHiringPartners)
    })
}

/**
 * Runs a foreach through each event object and outputs HTML elements with event details via eventGenerator
 *
 * @param events is an array of objects which contains information about events
 */
function displayEventsHandler(eventsAndHiringPartners) {
    if (eventsAndHiringPartners.events.data.length === 0) {
        eventList.innerHTML = eventsAndHiringPartners.events.message
    } else {
        eventList.innerHTML = ''
        displayEvents(eventsAndHiringPartners.events.data, eventsAndHiringPartners.hiringPartners, eventsAndHiringPartners.applicants).then(() => {
            let showInfoHeaders = document.querySelectorAll('.header-show-event-info')
            showInfoHeaders.forEach(function (header) {
                header.addEventListener('click', e => {
                    let buttonId = 'button' + e.target.dataset.reference
                    let targetId = 'moreInfo' + e.target.dataset.reference
                    let targetDiv = document.getElementById(targetId)
                    targetDiv.classList.toggle('hidden')
                    targetDiv.parentElement.classList.toggle('open')

                    document.querySelector(`[data-button-id = '${buttonId}']`).textContent = 'More info'
                    if (!targetDiv.classList.contains('hidden')) {
                        document.querySelector(`[data-button-id ='${buttonId}']`).textContent = 'Less info'
                    }
                })
            })
        })
        .then(() => {
            addEventListenerForCopyEmailsButton(eventsAndHiringPartners.events.data, eventsAndHiringPartners.applicants)

            let hpForms = document.querySelectorAll('.addHiringPartnerForm')
            hpForms.forEach(function (hpForm) {
                hpForm.addEventListener('submit', function (e) {
                    e.preventDefault()
                    let eventIdForm = e.target.id
                    const currentEventsMessage = document.querySelector(`.currentEventsMessages[data-event="${eventIdForm}"]`)
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

                                    if(responseJSON.success) {
                                        // displayHiringPartnersAttending({id: data.event_id})
                                    } else {
                                        currentEventsMessage.innerText = responseJSON.message
                                    }
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
    }
}

async function displayEvents(events, hiringPartners, applicants) {
    events.forEach(async (event) => {
        await eventGenerator(event, hiringPartners, applicants).then(event => {
            displayHiringPartnersAttending(event)
        })
        return event
    })
}

async function addEventListenersToHpDelete(event){
    let hpDeleteForms = document.querySelectorAll(`.hiring-partner input[data-event='${event.id}']`)
    hpDeleteForms.forEach(function(hpDelete){
        hpDelete.addEventListener('click', function(e){
            DeleteHPRequest(e, event)
        })
    })
}

function DeleteHPRequest(e, event) {
            let data = {
                event_id: e.target.dataset.event,
                hp_id: e.target.dataset.hp
            }
            fetch('./api/deleteHiringPartnerFromEvent', {
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                method: 'post',
                body: JSON.stringify(data)
            }) .then (response => response.json())
               .then (responseJSON => {
                    if (responseJSON.success) {
                        displayHiringPartnersAttending({id: data.event_id})
                    } else {
                        document.querySelector(`.currentEventsMessages[data-event="${event.id}"]`).innerText = responseJSON.message
                    }
                })
}

/**
 * Function takes an event ID and displays information about attending hiring partners and any attendees associated with a given event
 *
 * @param event, the ID of a given event
 *
 * @returns a response putting HTML on front end for the attending hiring partners
 */
async function displayHiringPartnersAttending(event){
    let data = {
        event_id: event.id
    }

    let hiringPartnersDiv = document.querySelector(`.hiring-partners[data-eventId='${event.id}']`)

    fetch('./api/getHpsByEventId', {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'post',
        body: JSON.stringify(data)

    })
        .then(response => response.json())
        .then(response => {
            hiringPartnersDiv.innerHTML = ''
            if (response.length > 0) {
                let hiringPartnerHTML = ""
                hiringPartnerHTML += `<h5>Attending hiring partners:</h5>`
                response.forEach(function(hiringPartner) {
                    hiringPartnerHTML += `<div class="hiring-partner">`
                    hiringPartnerHTML += `<p data-hpid='${hiringPartner.id}'><span class='bold-text-hp'>${hiringPartner.name}</span>`
                    if (hiringPartner.attendees != null) {
                        hiringPartnerHTML += `: ${hiringPartner.attendees}</p>`
                    }
                    if (!isPastPage) {
                        hiringPartnerHTML +=
                            `<input type="submit" class="btn btn-danger btn-sm" data-event="${event.id}" data-hp="${hiringPartner.id}" value="Delete">`
                    }
                    hiringPartnerHTML += `</div>`
                })
                hiringPartnersDiv.innerHTML += hiringPartnerHTML
            }
        }) .then(() => {
        addEventListenersToHpDelete(event)
    })
    return event
}

/**
 * Outputs HTML elements with event details
 *
 * @param events an object which contains information about an event
 */
async function eventGenerator(event, hiringPartners, applicants) {
    let eventInformation = ''
    let date = new Date(event.date).toDateString()
    let numberOfAttendees
    if (event.category_name === 'Assessment') {
        let assessmentApplicants = applicants.filter(applicant => applicant.assessmentDay === event.id)
        numberOfAttendees = assessmentApplicants.length
    }
    let headerDate = new Date(event.date).toDateString().substring(0,3) + ' ' + new Date(event.date).getUTCDate() + '/' + new Date(event.date).getUTCMonth() + '/' + new Date(event.date).getUTCFullYear()
    eventInformation +=
        `<div class="event">
        <div class="header header-show-event-info" data-reference='${event.id}'>
            <h4>${event.name} - <span class="headerDateTime">${headerDate} Time: ${event.start_time.slice(0, -3)} - ${event.end_time.slice(0, -3)} </span><span class="badge">${event.category_name}</span>`
    if (event.category_name === 'Assessment') {
        eventInformation += `<span class="badge">Attendees: ${numberOfAttendees}</span>`
    }
    eventInformation +=
            `</h4> 
            <button class="show-event-info btn" data-button-id='button${event.id}' data-reference='${event.id}'>More Info</button>
        </div>
        <div id="moreInfo${event.id}" class="hidden moreInfo">
        <p><span>Event Category:</span> ${event.category_name}</p>
        <p><span>Date:</span> ${date}</p>
        <p><span>Location:</span> ${event.location}</p>
        <p><span>Start Time:</span> ${event.start_time.slice(0, -3)}</p>
        <p><span>End Time:</span> ${event.end_time.slice(0, -3)}</p>`

    if (event.notes !== null) {
        eventInformation += `<p><span>Notes:</span> ${event.notes}</p>`
    }

    if (event.category_name === 'Assessment') {
        // put code for assessment event type here!
        eventInformation += '<div class="event-attendees-container">';
        eventInformation += '<table class="col-xs-12 table-bordered table event-attendees-table">';
        eventInformation += '<tr>';
        eventInformation += '<th class="col-xs-5">Name</th>';
        eventInformation += `<th class="email-column-header">Email <button class="btn copy-emails-button" data-id="${event.id}">Copy emails</button></th>`;
        eventInformation += '</tr>';
            applicants.forEach((applicant) => {
                if (applicant.assessmentDay == event.id) {
                    eventInformation += `<tr>`;
                    eventInformation += `<td><a class="myBtn"  data-id="${applicant.id}">${applicant.name}</a></td>`;
                    eventInformation += `<td>${applicant.email}</td>`;
                    eventInformation += `</tr>`;
                }
            });
        eventInformation += '</table>';
        eventInformation += '</div>';
    }
    displayApplicantModal()

    if (event.availableToHP == 1) {
        eventInformation += `<div class="event-attendees">`
        eventInformation += `<div class="hiring-partners col-xs-12 col-md-6" data-eventId='${event.id}'></div>`;
        if (!isPastPage) {
            eventInformation += `
                <div class='addHiringPartner col-xs-12 col-md-6'>
                    <h4>Add attendees</h4>
                    <form class='addHiringPartnerForm' id='${event.id}'>
    
                        <select data-event=${event.id}>
                            <option value='0'>Hiring partner</option>`
            eventInformation += `</select>
                        <div>
                            <label>Number of attendees:</label>
                            <input data-event='${event.id}' type='number' name='companyAttendees' class="companyAttendees" min='0'/>
                        </div>
                        <input value="Add Attendees" class="btn btn-primary btn-sm" type='submit'/> 
                    </form>
                    <div class='currentEventsMessages' data-event=${event.id}></div>
                </div>
            </div>
           </div>`
        }
    }

    eventInformation += `</div>`
    eventList.innerHTML += eventInformation
    const currentEventsMessage = document.querySelector(`.currentEventsMessages[data-event="${event.id}"]`)
    if (hiringPartners.status) {
        hiringPartners.data.forEach(function (hiringPartner) {
            document.querySelector(`select[data-event="${event.id}"]`).innerHTML += "<option value='" + hiringPartner.id + "'>" + hiringPartner.name + "</option>"
        })
    } else {
        currentEventsMessage.innerText = hiringPartners.message
    }
    return event
}

function addEventListenerForCopyEmailsButton(event, applicants) {
    let assessmentApplicants
    let copyEmailsButtons = document.querySelectorAll('.copy-emails-button')
    copyEmailsButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.stopPropagation()
            assessmentApplicants = applicants.filter(applicant => applicant.assessmentDay === event.target.dataset.id)
            let attendeeEmails = ''
            assessmentApplicants.forEach((applicant) => {
                attendeeEmails += applicant.email + '; '
            })
            navigator.clipboard.writeText(attendeeEmails)
            })
    })
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

    /**
     * Get all the applicants booked for assessment from the API
     *
     * @return array The JSON response
     */
    async function getAssessmentApplicants() {

        let response = await fetch('./api/getAssessmentApplicants', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'get',
        })
        return await response.json()

    }

    document.querySelector('#submit-search-event').addEventListener('click', function (e) {
        const searchInput = document.querySelector('#academy-events-search').value
        e.preventDefault()
        if ((searchInput.length) && searchInput.length < 256) {
            message.classList.remove('alert-danger')
            message.textContent = '';
            getEvents(searchInput)
            document.querySelector('#events-list').innerText = 'Results'
        } else {
            message.classList.add('alert-danger')
            message.textContent = 'Event search: must be between 1 and 255 characters'
        }
    })

    document.querySelector('#clear-search').addEventListener('click', function (e) {
        e.preventDefault()
        if (!window.location.href.includes('#events-list')) {
            window.location.href += '#events-list'
        }
        location.reload()
    })

