document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()

   isValidEmail()

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

function sendRequest(formData) {

    fetch('/api/addHiringPartner',{
        method: 'post',
        body: JSON.stringify(formData),
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
    }).then(function (data) {
        return data.json()
    }).catch(function(error){
        console.log(error)
    })
}