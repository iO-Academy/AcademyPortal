// const eventList = document.querySelector('#events')
// const message = document.querySelector('#messages')
// const isPastPage = document.querySelector('#events-list').dataset.eventType === 'Past'; // this is such a hack!
/**
 * Gets event information from the API and passes into the
 * displayEventsHandler function
 *
 * @return event data
 */


/**
 * Get all the hiring partners from the API
 *
 * @return array The JSON response
 */
async function getNextStageDetails() {

    let response = await fetch('./api/getNextStageOptions', {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'get',
    })
    var_dump('hello');
    return await response.json()
}




// document.querySelector('#submit-search-event').addEventListener('click', function(e) {
//     const searchInput = document.querySelector('#academy-events-search').value
//     e.preventDefault()
//     if ((searchInput.length) && searchInput.length < 256) {
//         message.classList.remove('alert-danger')
//         message.textContent = '';
//         getEvents(searchInput)
//         document.querySelector('#events-list').innerText = 'Results'
//     } else {
//         message.classList.add('alert-danger')
//         message.textContent = 'Event search: must be between 1 and 255 characters'
//     }
// })
//
// document.querySelector('#clear-search').addEventListener('click', function(e) {
//     e.preventDefault()
//     if (!window.location.href.includes('#events-list')) {
//         window.location.href += '#events-list'
//     }
//     location.reload()
// })
