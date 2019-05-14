$(document).ready(function(){
    $(".myBtn").click(function(){

        var url = '/displayApplicantInfo/' + this.dataset.id


        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        console.log('Looks like there was a problem. Status Code: ' +
                            response.status)
                        return;
                    }

                    // Examine the text in the response
                    response.json().then(function(data) {
                        console.log(data)
                        var noDataMessage = 'No information provided'
                        if(data.name != '') {
                            document.getElementById('name').innerHTML = data.name
                        }

                        if (data.email != '') {
                            document.getElementById('email').innerHTML = data.email
                        } else {
                            document.getElementById('email').innerHTML = noDataMessage
                        }
                        if (data.phoneNumber !='') {
                            document.getElementById('phoneNumber').innerHTML = data.phoneNumber
                        } else {
                            document.getElementById('phoneNumber').innerHTML = noDataMessage
                        }
                        document.getElementById('cohort').innerHTML =  data.cohortDate
                        if (data.whyDev !=='') {
                            document.getElementById('whyDev').innerHTML = data.whyDev
                        } else {
                            document.getElementById('whyDev').innerHTML = noDataMessage
                        }
                        if(data.codeExperience != '') {
                            document.getElementById('codeExperience').innerHTML =  data.codeExperience
                        } else {
                            document.getElementById('codeExperience').innerHTML = noDataMessage
                        }
                        if(data.hearAbout !== undefined) {
                            document.getElementById('hearAbout').innerHTML =  data.hearAbout
                        } else {
                            document.getElementById('hearAbout').innerHTML = noDataMessage
                        }
                        if (data.eligible != '0') {
                            document.getElementById('eligible').innerHTML = 'Eligible for studying in the UK'
                        } else {
                            document.getElementById('eligible').innerHTML = 'Not eligible for studying in the UK'
                        }
                        if (data.eighteenPlus !='0') {
                            document.getElementById('eighteenPlus').innerHTML = 'Over eighteen'
                        } else {
                            document.getElementById('eighteenPlus').innerHTML = 'Under eighteen'
                        }
                        if (data.finance !='0') {
                            document.getElementById('finance').innerHTML = 'true'
                        } else {
                            document.getElementById('finance').innerHTML = 'false'
                        }
                        if (data.notes !=='') {
                            document.getElementById('notes').innerHTML = data.notes
                        } else{
                            document.getElementById('notes').innerHTML = noDataMessage
                        }
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
