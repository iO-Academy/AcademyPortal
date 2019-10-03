const addHiringPartnerForm = document.querySelector('#add-hiring-partner-form')
const addContactForm = document.querySelector('#add-contact-form')

addHiringPartnerForm.addEventListener('submit', async e => {
    e.preventDefault()

    let data = {
        name: addHiringPartnerForm['company-name'].value.trim(),
        companySize: addHiringPartnerForm['company-size'].value,
        techStack: addHiringPartnerForm['company-tech-stack'].value.trim(),
        postcode: addHiringPartnerForm['company-postcode'].value.trim(),
        phoneNumber: addHiringPartnerForm['company-phone-number'].value.trim(),
        companyUrl: addHiringPartnerForm['company-url'].value.trim()
    }

    if( validateHiringPartnerForm(data) ) {
        await addHiringPartner(data)
        getHiringPartners()
    }
})

function validateHiringPartnerForm(data) {
    let message = ''

    let validateCompanyName = function (name) {
        if (name.length < 1) {
            message += 'Company Name is a required field!<br>'
            return false
        }
        if (name.length > 255) {
            message += 'Company Name is too long!<br>'
            return false
        }
        return true
    }(data.name)

    let validateCompanySize = function (size) {
        if (size == 0) {
            message += 'Company Size is a required field!<br>'
            return false
        }
        let companySizes = document.querySelector('#company-size').childElementCount
        if (size > companySizes) {
            message += 'Invalid company size option!<br>'
            return false
        }
        return true
    }(data.companySize)

    let validateTechStack = function (techStack) {
        if (techStack.length < 1) {
            message += 'Company Tech Stack is a required field!<br>'
            return false
        }
        if (techStack.length > 600) {
            message += 'Company Tech Stack is too long!<br>'
            return false
        }
    }(data.techStack)

    let validatePostcode = function (postcode) {
        if (postcode.length < 1) {
            message += 'Company Postcode is a required field!<br>'
            return false
        }
        if (postcode.length > 10) {
            message += 'Company Postcode is too long!<br>'
            return false
        }
        let regEx = /\b((?:(?:gir)|(?:[a-pr-uwyz])(?:(?:[0-9](?:[a-hjkpstuw]|[0-9])?)|(?:[a-hk-y][0-9](?:[0-9]|[abehmnprv-y])?)))) ?([0-9][abd-hjlnp-uw-z]{2})\b/ig
        if (!regEx.test(postcode)) {
            message += 'Invalid postcode format!<br>'
            success = false
        }
        return true
    }(data.postcode)

    let validatePhoneNumber = function (phone) {
        if (phone.length > 20) {
            message += 'Company Phone Number is too long!<br>'
            return false
        }
        let regEx = /^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})$/gm
        if (!regEx.test(phone)) {
            message += 'Invalid Phone Number format!<br>'
            return false
        }
        return true
    }(data.phoneNumber)

    let validateUrl = function (url) {
        if (url.length > 255) {
            message += 'Company Website URL is too long!<br>'
            return false
        }
        let regEx = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/gm
        if (!regEx.test(url)) {
            message += 'Invalid company URL!<br>'
            return false
        }
        return true
    }(data.companyUrl)

    document.getElementById('add-hiring-partner-messages').innerHTML = message
    if( validateCompanyName 
        && validateCompanySize 
        && validateTechStack 
        && validatePostcode 
        && validatePhoneNumber 
        && validateUrl ){
        return true
    } else {
        return false
    }
}

let addHiringPartner = async data => {
    fetch('./api/createHiringPartner', {
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

addContactForm.addEventListener('submit', e => {
    e.preventDefault()

    //TODO: validation

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
