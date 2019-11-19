
function validateField(data, field, noDataMessage = 'No information provided') {
    console.log(data[field])
    if (data[field] === '' || data[field] === null || data[field] === undefined || data[field] === 0 || data[field] === false) {
        document.getElementById(field).innerHTML = noDataMessage
    } else {
        document.getElementById(field).innerHTML = data[field]
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

                let contactsHTML = '<h3>Company Contacts</h3>'

                delete data[0]

                data.forEach(function (contact) {
                    contactsHTML += `
                        <h4>Name</h4><p>${contact.name}</p>
                        <h4>Email</h4><p>${contact.email}</p>
                        <h4>Job title</h4><p>${contact.job_title}</p>
                        <h4>Phone</h4><p>${contact.phone}</p>
                        <h4>Primary Contact</h4><p>${contact.is_primary_contact}</p>`

                    contactsHTML += '<hr>'
                })


                let contactDetails = {}

                contactDetails.contacts = contactsHTML

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
