let makeEventApiRequest = async(data) => {
    return fetch('/api/createHiringPartner', { // ADD STUFF LATER
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'post',
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then((data) => {
            if (data.success) {
                document.getElementById('create-events-form').reset()
                document.getElementById('messages').innerHTML = '<p>Event successfully added</p>'

            } else {
                document.getElementById('messages').innerHTML = '<p>Event not added</p>'
            }
        })

}