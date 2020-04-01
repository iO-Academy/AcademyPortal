const editButtons = document.querySelectorAll('.toggleEditForm');
const editForms = document.querySelectorAll('.stagesTableForm');
const editResponse = document.getElementById('editResponse');
const newStageForm = document.getElementById('newStageForm');
const createNewResponse = document.getElementById('createNewResponse');

editButtons.forEach((editButton, index) => {
    editButton.addEventListener('click', () => {
        if (editForms[index].style.display === '' || editForms[index].style.display === 'none') {
            editForms[index].style = 'display: block;';
        } else if (editForms[index].style.display === 'block') {
            editForms[index].style = 'display: none;'
        }
    })
});

editForms.forEach((editForm) => {
    editForm.addEventListener('submit', (e) => {
        e.preventDefault();
        let editTitleInput = e.target.firstElementChild.value;
        let id = e.target.dataset.id;
        let data = {
            "id" : id,
            "title" : editTitleInput
        };

        sendEditRequest(data);

    })
});

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
    if (reponse.status === 500) {
        editResponse.textContent = responseData.msg
    }
}

newStageForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let newStage = e.target.firstElementChild.value;
    let data = {
        "title" : newStage
    };

    sendNewStageRequest(data);

});

async function sendNewStageRequest(data) {
    let response = await fetchTemplate('/api/createStage', 'POST', data);
    let responseData = await response.json();
    if (reponse.status === 500) {
        createNewResponse.textContent = responseData.msg
    }
}
