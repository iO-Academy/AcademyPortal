const eventList = document.querySelector('#events')
const eventForm = document.querySelector('form')
const message = document.querySelector('#messages')

eventForm.addEventListener("submit", e => {
    e.preventDefault()

    // replace this with validation
    let data = {
        name: eventForm.elements['event-name'].value,
        category: eventForm.elements['event-category'].value,
        location: eventForm.elements['event-location'].value,
        date: eventForm.elements['event-date'].value,
        startTime: eventForm.elements['event-start-time'].value,
        endTime: eventForm.elements['event-end-time'].value,
        notes: eventForm.elements['event-notes'].value
    }
    
    fetch('api/addEvent', {
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
        if(responseJson.success) {
            eventForm.elements['event-name'].value = '',
            eventForm.elements['event-category'].value = '',
            eventForm.elements['event-location'].value = '',
            eventForm.elements['event-date'].value = '',
            eventForm.elements['event-start-time'].value = '',
            eventForm.elements['event-end-time'].value = '',
            eventForm.elements['event-notes'].value = ''
            message.innerText = responseJson.message
        } else {
            message.innerText = responseJson.message
        }
    })
})