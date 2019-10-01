async function getEvents () {
    await fetch('/api/getEvents', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
        .then( eventInfo => eventInfo.json())
        .then(eventInfo => displayHiringPartnerHandler(eventInfo.data))
}