
function validateField(data, field, noDataMessage = 'No information provided') {
    if (data[field] === '' || data[field] === null || data[field] === undefined || data[field] === 0 || data[field] === false) {
        document.getElementById(field).innerHTML = noDataMessage
    } else {
        document.getElementById(field).innerHTML = data[field]
    }
}

$(document).ready(function(){
    $(".myBtn").click(function(){
        var url = './api/getApplicant/' + this.dataset.id
        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        document.querySelector('#modal-main').innerHTML = ''
                        document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
                        response.status + '</div>'
                        return
                    }
                    // Examine the text in the response
                    response.json().then(function(data) {
                        let deleteButton = document.getElementById('deleteBtn')
                        deleteButton.dataset.id = data.id

                        validateField(data, 'name')
                        validateField(data, 'email')
                        validateField(data, 'phoneNumber')
                        validateField(data, 'cohortDate')
                        validateField(data, 'whyDev')
                        validateField(data, 'codeExperience')
                        validateField(data, 'hearAbout')
                        validateField(data, 'eligible', '<p class="alertUser">Not eligible for studying in the UK<p/>')
                        validateField(data, 'eighteenPlus', '<p class="alertUser">Under eighteen</p>')
                        validateField(data, 'finance', 'Would not like to apply for finance')
                        if (data.eligible !== 0) {
                            document.getElementById('eligible').innerHTML = 'Eligible for studying in the UK'
                        }
                        if (data.eighteenPlus !== 0) {
                            document.getElementById('eighteenPlus').innerHTML = 'Over eighteen'
                        }
                        if (data.finance !== 0) {
                            document.getElementById('finance').innerHTML = 'Would like to apply for finance'
                        }
                        validateField(data, 'notes')
                        document.getElementById('dateTimeAdded').innerHTML =  data.dateTimeAdded
                    })
                }
            )

        $("#myModal").modal()
    })
})

outputCohorts();