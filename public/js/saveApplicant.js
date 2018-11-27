document.getElementById('submitApplicant').addEventListener('click', function (e) {
    e.preventDefault()
    let formData = document.querySelectorAll(".submitApplicant")
    let data = getCompletedFormData()
    makeApiRequest(data)
})

function getCompletedFormData() {
    let formData = document.querySelectorAll(".submitApplicant")
    let data = {}
    formData.forEach(function (formItem) {
        data[formItem.name] = formItem.value
        if (formItem.type == 'checkbox') {
            data[formItem.name] = formItem.checked
        }
    })
    return data
}

function makeApiRequest(data) {
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
        .then(function () {
            window.location.href = '/admin';
        })

}
