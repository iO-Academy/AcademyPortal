window.addEventListener('load', (event) => {
    checkCookie()
});

const deleteButtons = document.querySelectorAll('.deleteBtn');
deleteButtons.forEach(deleteBtn => {
    deleteBtn.addEventListener('click', (e) => {
        const id = e.target.dataset.id;
        fetch('/api/deleteApplicant', {
            method: 'DELETE',
            body: JSON.stringify({"id": id}),
            headers: {
                "Content-Type": "application/json"
            }
        }).then((response) => {
            return response.json();
        }).then((responseData) => {
            document.cookie = `response = ${responseData.message}`;
            window.location.reload();
        });
    });
});

function checkCookie() {
    const elem = document.getElementById('deleteResponse');
    const response = getCookie("response");
    elem.textContent = response;
    document.cookie = "response=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function getCookie(cname) {
    const name = cname + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
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
