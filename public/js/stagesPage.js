const editButtons = document.querySelectorAll('.toggleEditForm');
const editForms = document.querySelectorAll('.stagesTableForm');
const editResponse = document.getElementById('editResponse');
const newStageForm = document.getElementById('newStageForm');
const createNewResponse = document.getElementById('createNewResponse');
const deleteButtons = document.querySelectorAll('.delete');

window.addEventListener('load', (event) => {
    checkCookie()
});

function checkCookie() {
    let elem = document.getElementById('editResponse');
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

//Handler for delete button
deleteButtons.forEach((deleteButton) => {
    deleteButton.addEventListener('click', async (e) => {
        let data = {
            "id" : e.target.dataset.id
        };
        await sendRequest('/api/deleteStage', 'DELETE', data)
        window.location.reload(true)
    })
})

//Handler for edit button
editButtons.forEach((editButton, index) => {
    editButton.addEventListener('click', () => {
        if (editForms[index].style.display === '' || editForms[index].style.display === 'none') {
            editForms[index].style = 'display: block;';
        } else if (editForms[index].style.display === 'block') {
            editForms[index].style = 'display: none;'
        }
    })
});

//Handler for submitting an edited stage
editForms.forEach((editForm, index) => {
    editForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let editTitleInput = e.target.firstElementChild.value;
        let id = e.target.dataset.id;
        let data = {
            "data" : [
                {
                    "id" : id,
                    "title" : editTitleInput,
                    "order" : (index + 1)
                }
            ]
        };

        await sendRequest('/api/updateStages', 'PUT', data);
        window.location.reload(true);
    })
});

//Handler for submitting a new stage
newStageForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    let newStage = e.target.firstElementChild.value;
    let data = {
        "title" : newStage
    };

    await sendRequest('/api/createStage', 'POST', data);
    window.location.reload(true);

});

//Fetch template
async function sendRequest(url, requestMethod, data) {
    let requestData = JSON.stringify(data);

    let response = await fetch(url, {
        method: requestMethod.toUpperCase(),
        body: requestData,
        headers: {
            "Content-Type" : "application/json"
        }
    })

    let responseData = await response.json();
    if (response.status === 500) {
        document.cookie = `response=${responseData.msg}`;
    }
}