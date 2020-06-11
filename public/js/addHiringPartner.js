const addHiringPartnerForm = document.querySelector('#add-hiring-partner-form')

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