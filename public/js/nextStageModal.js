

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
        $(".show-next-stage").click(function(){

            const url = './editStages/'
            fetch(url)
                .then(
                    function(response) {
                        return response.json()
                    }).then(function(data) {
console.log('hello');

                        let contactsHTML = ''

                        let yesNoSub = ['No', 'Yes']





                    })
                .catch(function() {
                    document.querySelector('#contacts').innerText = 'We were unable to retrieve the' +
                        ' requested information please refresh and try again.'
                        document.querySelector('#contacts').style.color = 'red'
                })

            $("#nextStageModal").modal()

            })
        })
}
