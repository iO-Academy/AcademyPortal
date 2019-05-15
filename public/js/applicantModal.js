
function validateField(data, field) {
    let noDataMessage = 'No information provided'
    if (data[field] === '' || data[field] === null || data[field] === undefined || data[field] === 0 || data[field] === false) {
        document.getElementById(field).innerHTML = noDataMessage
    } else {
        document.getElementById(field).innerHTML = data[field]
    }
}

$(document).ready(function(){
    $(".myBtn").click(function(){
        var url = '/displayApplicantInfo/' + this.dataset.id
        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        document.getElementById('modal-main').innerHTML = ''
                        document.querySelector('.modal-header').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
                        response.status + '</div>'
                    }
                    // Examine the text in the response
                    response.json().then(function(data) {
                        console.log(data)
                        validateField(data, 'name')
                        validateField(data, 'email')
                        validateField(data, 'phoneNumber')
                        validateField(data, 'cohortDate')
                        validateField(data, 'whyDev')
                        validateField(data, 'codeExperience')
                        validateField(data, 'hearAbout')
                        if (data.eligible !== 0) {
                            document.getElementById('eligible').innerHTML = 'Eligible for studying in the UK'
                        } else {
                             document.getElementById('eligible').innerHTML= '<p class="alertUser">Not eligible for studying in the UK<p/>'
                        }
                        if (data.eighteenPlus !== 0) {
                            document.getElementById('eighteenPlus').innerHTML = 'Over eighteen'
                        } else {
                            document.getElementById('eighteenPlus').innerHTML = '<p class="alertUser">Under eighteen</p>'
                        }
                        if (data.finance !== 0) {
                            document.getElementById('finance').innerHTML = 'Would like to apply for finance'
                        } else {
                            document.getElementById('finance').innerHTML = 'Would not like to apply for finance'
                        }
                        validateField(data, 'notes')
                        document.getElementById('dateTimeAdded').innerHTML =  data.dateTimeAdded
                    })
                }
            )
            .catch(function(err) {
                console.log('Fetch Error :-S', err)
            })

        $("#myModal").modal()
    })
})
