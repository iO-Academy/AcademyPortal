
let deleteButton = document.getElementById('deleteBtn')

    deleteButton.addEventListener('click', function (e) {
        let id = e.target.dataset.id
            console.log(id)

        // for testing move into fetch
        let elem = document.getElementById('deleteResponse')
        let foo = false
        if (foo == false) {
            let message = 'response=Applicant deleted successfully!'
            document.cookie = message
            window.location.href = "http://localhost:8080/displayApplicants";
            let cookie = document.cookie
            console.log(cookie)
            elem.textContent = getCookie('response')



        } else {
            elem.textContent = 'Error - there was a problem, please try again or contact your administrator'
        }
        fetch('/api/deleteApplicant', {
            method: 'DELETE',
            body: JSON.stringify({"id": id}),
            headers: {
                "Content-Type": "application/json"
            } .then(function(response){
            console.log(response.status)
                let elem = document.getElementById('deleteResponse')
                if (response.status === 200) {

                    //set cooking message to success
                    window.location.reload(true)
                    elem.textContent = 'Applicant deleted successfully!'
                    } else {
                    //error cookie set message to error.
                    elem.textContent = 'Error - there was a problem deleting applicant, please try again or contact your administrator'
                }

        })

        });
 // add eventListen on page load
window.addEventListener('reload', function(e) {
        console.log('hello')
})