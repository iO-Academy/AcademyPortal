document.getElementById('submitApplicant').addEventListener('click', e => {
    e.preventDefault()
    let data = getCompletedFormData()
    let validate = validateFormInputs(data)
    if (validate) {
        makeApiRequest(data)
    } else {
        document.getElementById('errorMsg').innerHTML = 'Not all fields have been filled out. Try again...'
    }
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
    return fetch('./api/saveApplicant', {
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
                window.location.href = './admin';
            } else {
                document.getElementById('errorMsg').innerHTML = "Please contact administrator. Or <a href='/admin'>click here</a> to return to admin page"
            }
        })
}

let validateFormInputs = (data) => {
    let validate = []

    validate.push(evalLength(data.name))
    validate.push(evalLength(data.email))
    validate.push(evalLength(data.phoneNumber))
    validate.push(evalLength(data.whyDev))
    validate.push(evalLength(data.codeExperience))
    validate.push(evalLength(data.hearAboutId))

    return validate.includes(false) ? false : true
}

function evalLength(data) {
    if(data.length >= 1 && data.length <= 255){
        return true
    } else {
        return false
    }
}