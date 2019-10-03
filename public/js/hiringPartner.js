document.getElementById('submit-hiring-partner').addEventListener('click', async (e) => {
    e.preventDefault()

    let data = getCompletedFormData()
    let validate = validateForm()
    if(validate) {
        await addHiringPartner(data)
        getHiringPartners()
    }
})

function validateForm() {
    let success = true
    let message = ''
    let inputs = document.querySelectorAll('.submit-hiring-partner')
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

        if (element.name === 'company-size' && element.value === '0') {
            message += 'Please select a company size!<br>'
            success = false
        }

        if (element.name === 'company-postcode') {
            let postcode =  element.value.trim()
            let pattern = /\b((?:(?:gir)|(?:[a-pr-uwyz])(?:(?:[0-9](?:[a-hjkpstuw]|[0-9])?)|(?:[a-hk-y][0-9](?:[0-9]|[abehmnprv-y])?)))) ?([0-9][abd-hjlnp-uw-z]{2})\b/ig
            let regEx = new RegExp(pattern)
            if (!regEx.test(postcode)) {
                message += 'Invalid postcode!<br>'
                success = false
            }
        }

        if (element.name === 'company-phone-number' && element.value.length > 0) {
            let phoneNumber =  element.value.trim()
            let pattern = /^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})$/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(phoneNumber)) {
                message += 'Invalid phone number format!<br>'
                success = false
            }
        }

        if (element.name === 'company-url' && element.value.length > 0) {
            let url =  element.value.trim()
            let pattern = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/gm
            let regEx = new RegExp(pattern)
            if (!regEx.test(url)) {
                message += 'Invalid URL format!<br>'
                success = false
            }
        }

        if (element.name === 'company-size') {
            let idRange = document.getElementsByTagName('option').length -1
            if (element.value > idRange) {
                message += 'Invalid company size range info!<br>'
                success = false
            }
        }
    })

    document.getElementById('hiring-partner-messages').innerHTML = message
    return success
}

let getCompletedFormData = () => {
    let formData = document.querySelector('#add-hiring-partner-form')
    let data = {
        name: formData['company-name'].value,
        companySize: formData['company-size'].value,
        techStack: formData['company-tech-stack'].value,
        postcode: formData['company-postcode'].value,
        phoneNumber: formData['company-phone-number'].value,
        companyUrl: formData['company-url'].value
    }
    return data
}

let addHiringPartner = async(data) => {
    return fetch('./api/createHiringPartner', {
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
            document.getElementById('add-hiring-partner-form').reset()
            document.getElementById('add-hiring-partner-messages').innerHTML = '<p>Hiring Partner successfully added.</p>'
        } else {
            document.getElementById('add-hiring-partner-messages').innerHTML = '<p>Hiring Partner not added.</p>'
        }
    })
}

/**
 * Gets hiring partner information from the API and passes into the displayHandler function
 *
 * @return hiring partner data
 */
async function getHiringPartners () {
    await fetch('./api/getHiringPartnerInfo', {
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
        companyInformation +=
            `<div class="company-name">
                <p>${partnerCompany.name}</p>
                <button class="show-company-info" data-reference='${partnerCompany.id}'>More Info</button>
                <div id="more-info${partnerCompany.id}" class="hide more-info">
                    <p>Company size: ${partnerCompany.size}</p>
                    <p>Tech Stack: ${partnerCompany.tech_stack}</p>
                    <p>Postcode: ${partnerCompany.postcode}</p>`
        if (partnerCompany.phone_number !== null) {
            companyInformation += `<p>Phone number: ${partnerCompany.phone_number}</p>`
        }
        if (partnerCompany.url_website !== null) {
            companyInformation += `<a href="https://${partnerCompany.url_website}" target="_blank">${partnerCompany.url_website}</a>`
        }
        companyInformation += `</div></div>`
    })
    companyDisplayer.innerHTML = companyInformation

    let showInfoButtons = document.querySelectorAll('.show-company-info')
    showInfoButtons.forEach(function (button) {
        button.addEventListener('click', (e) => {
            let targetId = 'more-info' + e.target.dataset.reference
            let targetDiv = document.getElementById(targetId)
            targetDiv.classList.toggle('hide')
        })
    })
}

getHiringPartners()

const addContactFom = document.querySelector('#add-contact-form')
addContactForm.addEventListener('submit', e => {
    e.preventDefault()

    //validation

    let data = {
        contactName: addContactForm['contact-name'].value,
        contactCompanyId: addContactForm['company'].value,
        contactEmail: addContactForm['contact-email'].value,
        contactJobTitle: addContactForm['contact-job-title'].value,
        contactPhone: addContactForm['contact-phone-number'].value,
        contactIsPrimary: addContactForm['contact-is-primary'].value,
    }

    fetch('./api/addContact', {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'post',
        body: JSON.stringify(data)
    })
    .then( response => response.json())
    .then( data => {
        if (data.success) {
            document.getElementById('add-contact-form').reset()
            document.getElementById('add-contact-messages').innerHTML = data.message
        } else {
            document.getElementById('add-contact-messages').innerHTML = data.message
        }
    })
})
