

function validateField(data, field, noDataMessage = 'No information provided') {
    if (data[field] === '' || data[field] === null || data[field] === undefined || data[field] === 0 || data[field] === false) {
        document.getElementById(field).innerHTML = noDataMessage
    } else {
        document.getElementById(field).innerHTML = data[field]
    }
}

function validateContactField(contactField, noDataMessage = 'No information provided') {
    if (contactField === '' || contactField === null || contactField === undefined || contactField === 0 || contactField === false) {
        return noDataMessage
    } else {
        return contactField
    }

}

function addEventListenersForModal() {
    console.log('2nd hello');
    $(document).ready(function(){
        $(".myBtn").click(function(){
            var url = './api/displayCompanyInfo/' + this.dataset.id
            fetch(url)
                .then(
                    function(response) {
                        return response.json()
                    }).then(function(data) {
                            validateField(data[0], 'name')
                            validateField(data[0], 'size')
                            validateField(data[0], 'tech_stack')
                            validateField(data[0], 'postcode')
                            validateField(data[0], 'phone_number')
                            validateField(data[0], 'url_website')

                let contactsHTML = ''

                delete data[0]

                let yesNoSub = ['No', 'Yes']

                data.forEach(function (contact) {

                    $validatedName = validateContactField(contact.name)
                    $validatedEmail = validateContactField(contact.email)
                    $validatedJobTitle = validateContactField(contact.job_title)
                    $validatedPhone = validateContactField(contact.phone)
                    $validatedIsPrimaryContact = validateContactField(yesNoSub[contact.is_primary_contact])

                    contactsHTML += `
                        <h4>Name</h4><p>${$validatedName}</p>
                        <h4>Email</h4><p>${$validatedEmail}</p>
                        <h4>Job title</h4><p>${$validatedJobTitle}</p>
                        <h4>Phone</h4><p>${$validatedPhone}</p>
                        <h4>Primary Contact</h4><p>${$validatedIsPrimaryContact}</p>`
                    contactsHTML += '<hr>'
                })

                let contactDetails = {}

                contactDetails.contacts = contactsHTML

                console.log('xxxxxxxx')
                console.log(contactDetails)

                validateField(contactDetails, 'contacts')
                    })
            $("#myModal").modal()

            // .catch(function() {
                //         console.log('hello')
                // document.querySelector('#modal-main').innerHTML = ''
                // document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
                //     response.status + '</div>'
            })
        })
    // })
}
