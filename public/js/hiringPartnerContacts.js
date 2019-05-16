document.getElementById('submitHiringPartnerContact').addEventListener('click', e => {
    e.preventDefault()

    let data = getCompletedFormData()
    let validate = validateForm()
    if(validate) {
        makeApiRequest(data)
        getHiringPartnerContacts()
    }

})


function validateForm() {

    let success = true
    let message = ''
    let inputs = document.querySelectorAll('.submitHiringPartnerContact')
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

        if (element.name === 'contactEmail') {
            let postcode =  element.value.trim()
            let pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            let regEx = new RegExp(pattern)
            if (!regEx.test(contactEmail)) {
                message += 'Invalid email address!<br>'
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

        document.getElementById('messages').innerHTML = message

        return success
    }

    let getCompletedFormData = () => {
        let formData = document.querySelectorAll(".submitHiringPartnerContact")
        let data = {}
        formData.forEach(formItem=> {
            data[formItem.name] = formItem.value
        })
        return data
    }

    let makeApiRequest = async(data) => {
        return fetch('/api/createHiringPartnerContact', {
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
                    document.getElementById('hiringPartnerContactForm').reset()
                    document.getElementById('messages').innerHTML = '<p>Hiring Partner Contact successfully added</p>'

                } else {
                    document.getElementById('messages').innerHTML = '<p>Hiring Partner Contact not added</p>'
                }
            })

    }

    /**
     * Gets hiring partner contacts information from the API and passes into the displayHandler function
     *
     * @return hiring partner contacts data
     */

    async function getHiringPartnerContacts () {
        await fetch('/api/getHiringPartnerContacts', {
            credentials: "same-origin",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        })
            .then( hiringPartnerContacts => hiringPartnerContacts.json())
            .then(hiringPartnerContacts => displayHiringPartnerContactPage(hiringPartnerContacts.data))
    }

    /**
     * Runs a foreach through each hiring partner contact object and outputs HTML elements with hiring partner contact's details
     *
     * @param partnerContacts is an array of objects which contains information about hiring partner contacts
     *
     * @return a divs of the contact name with a button that reveals each hiring partner contact's additional info on each line
     */

    function displayHiringPartnerContactsHandler(partnerContacts){
        let contactDisplayer = document.getElementById('contacts')
        let contactInformation = ''
        partnerContacts.forEach(function(partnerContact){
            contactInformation +=
                `<div class="contactName">
		                <p>${partnerContact.name}</p>
		                <button class="showContactInfo" data-reference='${partnerContact.id}'>More Info</button>
		                <div id="moreInfo${partnerContact.id}" class="hide moreInfo">
		                    <p>Job Title: ${partnerContact.job_title}</p>
		                    <p>Email: ${partnerContact.email}</p>`
            if (partnerContact.phone_number !== null) {
                contactInformation += `<p>Phone number: ${partnerContact.phone_number}</p>`
            }

            contactInformation += `</div></div>`
        })
        contactDisplayer.innerHTML = contactInformation

        let showInfoButtons = document.querySelectorAll('.showContactInfo')
        showInfoButtons.forEach(function (button) {
            button.addEventListener('click', (e) => {
                let targetId = 'moreInfo' + e.target.dataset.reference
                let targetDiv = document.getElementById(targetId)
                targetDiv.classList.toggle('hide')
            })
        })
    }
}

getHiringPartnerContacts()