
document.getElementById('submitHiringPartner').addEventListener('click', e => {
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
    let inputs = document.querySelectorAll('.submitHiringPartner')
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

        if (element.name === 'postcode') {
            let postcode =  element.value.trim()
            let pattern = /\b((?:(?:gir)|(?:[a-pr-uwyz])(?:(?:[0-9](?:[a-hjkpstuw]|[0-9])?)|(?:[a-hk-y][0-9](?:[0-9]|[abehmnprv-y])?)))) ?([0-9][abd-hjlnp-uw-z]{2})\b/ig
            let regEx = new RegExp(pattern)
            if (!regEx.test(postcode)) {
                message += 'Invalid postcode!<br>'
                success = false
            }
        }

        if (element.name === 'phoneNumber' && element.value.length > 0) {
            let phoneNumber =  element.value.trim()
            let pattern = /^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})$/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(phoneNumber)) {
                message += 'Invalid phone number format!<br>'
                success = false
            }
        }

        if (element.name === 'companyUrl' && element.value.length > 0) {
            let url =  element.value.trim()
            let pattern = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(url)) {
                message += 'Invalid URL format!<br>'
                success = false
            }
        }

        if (element.name === 'companySize') {
            let idRange = document.getElementsByTagName('option').length -1
            if (element.value > idRange) {
                message += 'Invalid company size range info!<br>'
                success = false
            }
        }
    })

    document.getElementById('messages').innerHTML = message

    return success
}

let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".submitHiringPartner")
    let data = {}
    formData.forEach(formItem=> {
        data[formItem.name] = formItem.value
    })
    return data
}

let makeApiRequest = async(data) => {
    return fetch('/api/createHiringPartner', {
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
                document.getElementById('hiringPartnerForm').reset()
                document.getElementById('messages').innerHTML = '<p>Hiring Partner successfully added</p>'

            } else {
                document.getElementById('messages').innerHTML = '<p>Hiring Partner not added</p>'
            }
        })

}

/**
 * Gets hiring partner information from the API and passes into the displayHandler function
 *
 * @return hiring partner data
 */

async function getHiringPartners () {
    await fetch('/api/getHiringPartnerInfo', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
        .then( hiringPartnerInfo => hiringPartnerInfo.json())
        .then(hiringPartnerInfo => displayHiringPartnerHandler(hiringPartnerInfo.data))
}

/**
 * Runs a foreach through each hiring partner object and outputs HTML elements with hiring partner's details
 *
 * @param partnerCompanies is an array of objects which contains information about hiring partners
 *
 * @return a divs of the company name with a button that reveals each hiring partner's additional info on each line
 */

function displayHiringPartnerHandler(partnerCompanies){
    let companyDisplayer = document.getElementById('companies')
    let companyInformation = ''
    partnerCompanies.forEach(function(partnerCompany){
        console.log(partnerCompany.url_website)
        companyInformation +=
            `<div class="companyName">
                <p>${partnerCompany.name}</p>
                <button class="showCompanyInfo" data-reference='${partnerCompany.id}'>More Info</button>
                <div id="moreInfo${partnerCompany.id}" class="hide moreInfo">
                    <p>Company size: ${partnerCompany.size}</p>
                    <p>Tech Stack: ${partnerCompany.tech_stack}</p>
                    <p>Postcode: ${partnerCompany.postcode}</p>
                    <p>Phone number: ${partnerCompany.phone_number}</p>
                    <a href="https://${partnerCompany.url_website}" target="_blank">${partnerCompany.url_website}</a>
                </div>
            </div>`
    })
    companyDisplayer.innerHTML = companyInformation

    let showInfoButtons = document.querySelectorAll('.showCompanyInfo')
    showInfoButtons.forEach(function (button) {
        button.addEventListener('click', (e) => {
            let targetId = 'moreInfo' + e.target.dataset.reference
            let targetDiv = document.getElementById(targetId)
            targetDiv.classList.toggle('hide')
        })
    })
}

getHiringPartners()

