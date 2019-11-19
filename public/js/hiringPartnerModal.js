
function validateField(data, field, noDataMessage = 'No information provided') {
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
                        console.log(data)

                            // console.log(data[0])
                            // data[0]
                            // data[1]-data[x] loop
                            validateField(data[0], 'name')
                            validateField(data[0], 'size')
                            validateField(data[0], 'tech_stack')
                            validateField(data[0], 'postcode')
                            validateField(data[0], 'phone_number')
                            validateField(data[0], 'url_website')
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
