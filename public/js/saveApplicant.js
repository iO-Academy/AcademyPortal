document.getElementById('submitApplicant').addEventListener('click', e => {
    e.preventDefault()
    let data = getCompletedFormData()
    makeApiRequest(data)
})

let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".submitApplicant")
    let data = {}
    formData.forEach(formItem => {
        data[formItem.name] = formItem.value
        if (formItem.type == 'checkbox') {
            data[formItem.name] = formItem.checked
        }
    })
    return data
}

let makeApiRequest = async (data) => {
    return fetch('/api/saveApplicant', {
        credentials: "same-origin",
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
                window.location.href = '/admin';
            } else {
                document.getElementById('errorMsg').innerHTML = "Please contact administrator. Or <a href='/admin'>click here</a> to return to admin page"
            }
        })
}
