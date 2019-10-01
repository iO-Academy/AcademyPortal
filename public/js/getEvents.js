/**
 * Gets event information from the API and passes into the displayHandler function
 *
 * @return event data
 */
async function getEvents() {
    await fetch('/api/getEvents', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
        .then(eventInfo => eventInfo.json())
        .then(eventInfo => displayEventsHandler(eventInfo.data))
}

/**
 * Runs a foreach through each event object and outputs HTML elements with event details
 *
 * @param events is an array of objects which contains information about events
 *
 * @return a divs of the event name with a button that reveals each event's additional info on each line
 */
function displayEventsHandler(events) {
    let eventDisplayer = document.getElementById('events')
    let eventInformation = ''
    events.forEach(function (event) {
        eventInformation +=
            `<div class="event-name">
                <p>${event.name}</p>
                <button class="show-event-info" data-reference='${event.id}'>More Info</button>
                <div id="moreInfo${event.id}" class="hide moreInfo">
                    <p>Event Category: ${event.category}</p
                    <p>Date: ${event.date}</p>
                    <p>Location: ${event.location}</p>
                    <p>Start Time: ${event.startTime}</p>
                    <p>End Time: ${event.endTime}</p>
                    <p>Notes: ${event.notes}</p>`
        if (event.notes !== null) {
            eventInformation += `<p>Notes: ${event.notes}</p>`
        }

        eventInformation += `</div></div>`
    })
    eventDisplayer.innerHTML = eventInformation

    let showInfoButtons = document.querySelectorAll('.show-event-info')
    showInfoButtons.forEach(function (button) {
        button.addEventListener('click', (e) => {
            let targetId = 'moreInfo' + e.target.dataset.reference
            let targetDiv = document.getElementById(targetId)
            targetDiv.classList.toggle('hide')
        })
    })
}

getEvents()