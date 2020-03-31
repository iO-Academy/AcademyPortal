window.addEventListener('load', (event) => {
       checkCookie()
})

let deleteButton = document.getElementById('deleteBtn')
    deleteButton.addEventListener('click', (e) => {
        let id = e.target.dataset.id
        fetch('/api/deleteApplicant', {
            method: 'DELETE',
            body: JSON.stringify({"id": id}),
            headers: {
                "Content-Type": "application/json"
            }
        }).then((response) => {
                if (response.status === 200) {
                    document.cookie = 'response=success'
                    } else if (response.status === 500) {
                    document.cookie = 'response=fail'
                }
                window.location.reload(true)
        })
    })

function checkCookie() {
    let elem = document.getElementById('deleteResponse')
    let response = getCookie("response")
        if (response == "success") {
            elem.textContent = 'Applicant has been successfully deleted'
        } else if (response == "fail") {
            elem.textContent = 'Error - Applicant could not be deleted, please contact system admin'
        } document.cookie = "response=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
