document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()

    const formData = getFormData()
    sendRequest(formData)
})

function validateRequired(input) {
    return (input != '')
}


function getFormData() {
    let formData = {}
    const elements = document.querySelectorAll(".isField")

    elements.forEach(function(element) {
        formData[element.name] = element.value
    })
    return formData
}

async function fetchData(formData) {
    let response = await fetch('/api/addHiringPartner', {
        method: 'post',
        body: JSON.stringify(formData),
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        }
    })
    let data = await response.json()
    return data
}

function sendRequest(formData) {
    fetchData(formData).then(function (data) {
        console.log(data)
    }).catch(function (err) {
        console.log(err)
    })
}