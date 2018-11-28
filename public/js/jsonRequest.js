let jsonRequest = async (path, data) => {
    let response =  await fetch(`/api/${path}`,
        {
            credentials: "same-origin",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(data => data.json())
    return response
}