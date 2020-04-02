const editButtons = document.querySelectorAll('.toggleEditForm');
const editForms = document.querySelectorAll('.stagesTableForm');
const editResponse = document.getElementById('editResponse');
const newStageForm = document.getElementById('newStageForm');
const createNewResponse = document.getElementById('createNewResponse');
const deleteButtons = document.querySelectorAll('.delete');

//Handler for delete button
deleteButtons.forEach((deleteButton) => {
    deleteButton.addEventListener('click', (e) => {
        console.log (e.target.dataset.id)
        let data = {
            "id" : e.target.dataset.id
        };
        let result = deleteStageRequest(data)
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
    editForm.addEventListener('submit', (e) => {
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

        sendEditRequest(data);
        window.location.reload(true);
    })
});

//Handler for submitting a new stage
newStageForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let newStage = e.target.firstElementChild.value;
    let data = {
        "title" : newStage
    };

    sendNewStageRequest(data);
    window.location.reload(true);

});

//Fetch template
async function fetchTemplate(url, requestMethod, data) {
    let requestData = JSON.stringify(data);

    return await fetch(url, {
        method: requestMethod.toUpperCase(),
        body: requestData,
        headers: {
            "Content-Type" : "application/json"
        }
    })

}

async function sendEditRequest(data) {
    let response = await fetchTemplate('/api/updateStages', 'PUT', data);
    let responseData = await response.json();
    if (response.status === 500) {
        editResponse.textContent = responseData.msg
    }
}

async function sendNewStageRequest(data) {
    let response = await fetchTemplate('/api/createStage', 'POST', data);
    let responseData = await response.json();
    if (response.status === 500) {
        createNewResponse.textContent = responseData.msg
    }
}

async function deleteStageRequest(data) {
    let response = await fetchTemplate('/api/deleteStage', 'DELETE', data);
    let responseData = await response.json();
    if (response.status === 500) {
        createNewResponse.textContent = responseData.msg
    }
}
