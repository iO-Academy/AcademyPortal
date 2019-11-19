const addHiringPartnerForm = document.querySelector('#add-hiring-partner-form')
const addContactForm = document.querySelector('#add-contact-form')

addHiringPartnerForm.addEventListener('submit', async e => {
    e.preventDefault()
    console.log('bing')

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
        return true;
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
        if (!isPostcode(postcode)) {
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
        if (!isPhoneNumber(phone)) {
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
        if (!isUrl(url)) {
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
    .then(hiringPartnerInfo => hiringPartnerInfo.json())
    .then(hiringPartnerInfo => displayHiringPartnerHandler(hiringPartnerInfo.data))
}

getHiringPartners()


/**
 * Runs a foreach through each hiring partner object and outputs HTML elements with hiring partner's details
 *
 * @param partnerCompanies is an array of objects which contains information about hiring partners
 */
function displayHiringPartnerHandler(partnerCompanies){
    let companyNamesHTML = '';
    console.log('hello')
    partnerCompanies.forEach(function(partnerCompany){
        companyNamesHTML += `<div class="company-name"><a data-id=${partnerCompany.id} type="button"  class="myBtn">${partnerCompany.name}</a></div>`;
    })
    document.querySelector('#companies').innerHTML = companyNamesHTML;
    addEventListenersForModal();
}


addContactForm.addEventListener('submit', e => {
    e.preventDefault()

    let data = {
        contactName: addContactForm['contact-name'].value.trim(),
        contactCompanyId: addContactForm['company'].value,
        contactEmail: addContactForm['contact-email'].value.trim(),
        contactJobTitle: addContactForm['contact-job-title'].value.trim(),
        contactPhone: addContactForm['contact-phone-number'].value.trim(),
        contactIsPrimary: addContactForm['contact-is-primary'].checked,
    }

    if(validateAddContactForm(data)){
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
    }
})

function validateAddContactForm(data) {
    let message = ''

    let validateCompany = function (company) {
        if (company == 0) {
            message += 'Contact Company is a required field!<br>'
            return false
        }
        let companySizes = document.querySelector('#company-size').childElementCount
        if (company > companySizes) {
            message += 'Invalid company option!<br>'
            return false
        }
        return true
    }(data.contactCompanyId)

    let validateName = function (name) {
        if (name.length < 1) {
            message += 'Contact Name is a required field!<br>'
            return false
        }
        if (name.length > 255) {
            message += 'Contact Name is too long!<br>'
            return false
        }
        return true
    }(data.contactName)

    let validateEmail = function (email) {
        if (email.length < 1) {
            message += 'Contact eMail is a required field!<br>'
            return false
        }
        if (email.length > 255) {
            message += 'Contact eMail is too long!<br>'
            return false
        }
        if (!isEmail(email)) {
            message += 'Invalid email format!<br>'
            return false
        }
        return true
    }(data.contactEmail)

    let validateJobTitle = function (jobTitle) {
        if (jobTitle.length > 255) {
            message += 'Contact Job Title is too long!<br>'
            return false
        }
        return true
    }(data.contactJobTitle)

    let validatePhoneNumber = function (phone) {
        if (phone.length == 0) {
            return true
        }
        if (phone.length > 20) {
            message += 'Contact Phone Number is too long!<br>'
            return false
        }
        if (!isPhoneNumber(phone)) {
            message += 'Invalid Phone Number format!<br>'
            return false
        }
        return true
    }(data.contactPhone)

    let validateIsPrimary = function (isPrimary) {
        if (!(isPrimary == 0 || isPrimary == 1)) {
            message += 'Primary Contact has an invalid value!<br>'
            return false
        }
        return true
    }(data.contactIsPrimary)

    document.getElementById('add-contact-messages').innerHTML = message
    if( validateCompany 
        && validateName 
        && validateEmail 
        && validateJobTitle
        && validatePhoneNumber 
        && validateIsPrimary ){
        return true
    } else {
        return false
    }
}