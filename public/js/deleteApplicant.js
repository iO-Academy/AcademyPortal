window.addEventListener('load', (event) => {
       checkCookie()
});

let deleteButton = document.getElementById('deleteBtn');
    deleteButton.addEventListener('click', (e) => {
        let id = e.target.dataset.id;
        fetch('/api/deleteApplicant', {
            method: 'DELETE',
            body: JSON.stringify({"id": id}),
            headers: {
                "Content-Type": "application/json"
            }
        }).then((response) => {
            return response.json()
        }).then((responseData) => {
            document.cookie = `response=${responseData.msg}`;
            window.location.reload(true)
        })
    });

function checkCookie() {
    let elem = document.getElementById('deleteResponse');
    let response = getCookie("response");
    elem.textContent = response;
    document.cookie = "response=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
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
