document.getElementById('events').addEventListener('click', e => {
    e.preventDefault()

    let data = getCompletedFormData()
    let validate = validateForm()
    if(validate) {
        makeApiRequest(data)
        getHiringPartners()
    }

})

function validateForm() {

    let success = true
    let message = ''
    let inputs = document.querySelectorAll('.createEvents')
    inputs.forEach(function (element) {
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.name + ' is a required field! <br>'
            success = false
        }
        let maxLength = element.getAttribute('data-max')
        if (required && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>'
            success = false
        }

        if (element.name === 'companySize' && element.value === '0') {
            message += 'Please select a company size!<br>'
            success = false
        }
        
        if (element.name === 'companySize') {
            let idRange = document.getElementsByTagName('option').length -1
            if (element.value > idRange) {
                message += 'Invalid company size range info!<br>'
                success = false
            }
        }

        if (element.name === 'event-date') {
            let date =  element.value.trim()
            let pattern = /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/i
            let regEx = new RegExp(pattern)
            if (!regEx.test(date)) {
                message += 'Invalid date!<br>'
                success = false
            }
        }
    })

    document.getElementById('messages').innerHTML = message

    return success
}

let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".createEvents")
    let data = {}
    formData.forEach(formItem=> {
        data[formItem.name] = formItem.value
    })
    return data
}