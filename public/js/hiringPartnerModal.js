

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
    $(document).ready(function(){
        $(".show-partner-info").click(function(){
            const url = './api/displayCompanyInfo/' + this.dataset.id
            fetch(url)
                .then(
                    function(response) {
                        return response.json()
                    }).then(function(data) {
                        validateField(data.data.company, 'name')
                        validateField(data.data.company, 'size')
                        validateField(data.data.company, 'tech_stack')
                        validateField(data.data.company, 'postcode')
                        validateField(data.data.company, 'phone_number')
                        validateField(data.data.company, 'url_website')

                        let contactsHTML = ''
                        contactsHTML +=`                           
                            <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Job title</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>`

                        let yesNoSub = ['', '<i class="glyphicon glyphicon-king"></i>']

                        data.data.contacts.forEach(function (contact) {

                            let validatedName = validateContactField(contact.name)
                            let validatedEmail = validateContactField(contact.email)
                            let validatedJobTitle = validateContactField(contact.job_title)
                            let validatedPhone = validateContactField(contact.phone)
                            let validatedIsPrimaryContact = validateContactField(yesNoSub[contact.is_primary_contact], '')

                            contactsHTML += `
                                <tr>
                                <td>${validatedName}</td>
                                <td>${validatedEmail}</td>
                                <td>${validatedJobTitle}</td>
                                <td>${validatedPhone}</td>
                                <td class="text-center h3">${validatedIsPrimaryContact}</td>
                                </tr>`

                        })
                            contactsHTML += '</table>'


                        let contactDetails = {}

                        contactDetails.contacts = contactsHTML

                        validateField(contactDetails, 'contacts')
                    })
                .catch(function() {
                    document.querySelector('#contacts').innerText = 'We were unable to retrieve the' +
                        ' requested information please refresh and try again.'
                        document.querySelector('#contacts').style.color = 'red'
                })

                $("#myModal").modal()

            })
        })
}
