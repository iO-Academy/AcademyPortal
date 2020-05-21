const editButtons = document.querySelectorAll('.toggleEditForm');
const editForms = document.querySelectorAll('.stagesTableForm');
const editResponse = document.getElementById('editResponse');
const newStageForm = document.getElementById('newStageForm');
const createNewResponse = document.getElementById('createNewResponse');
const deleteButtons = document.querySelectorAll('.delete');
const optionButtons = document.querySelectorAll('.toggleEditOptions');
const optionEditSubmits = document.querySelectorAll('.optionEditSubmit');
const optionEdits = document.querySelectorAll('.optionEdit');
const optionDeletes = document.querySelectorAll('.optionDelete');
const optionAddSubmits = document.querySelectorAll('.optionAddSubmit');
const optionAddTitle = document.querySelectorAll('.optionAddTitle');
const optionEditTitle = document.querySelectorAll('.optionEditTitle');
const optionTitle = document.querySelectorAll('.optionTitle');
const optionsContainers = document.querySelectorAll('.optionsContainer');
const optionEditForms = document.querySelectorAll('.optionTableForm');

// Set up the modal for deleting the final option
const modal=document.querySelector('.modalContainer');
const closeModal = document.querySelector('.closeModal');
closeModal.addEventListener('click', (e) => {
    e.preventDefault()
    modal.classList.add('hidden')
})
const deleteAllOptions = document.querySelector('.deleteAllOptions');

optionEditSubmits.forEach((optionEditSubmit) => {
    optionEditSubmit.addEventListener('click', async (e) => {
        e.preventDefault()
        let optionTitle = e.target.parentElement.querySelector('.optionEditTitle').value
        let optionId = e.target.dataset.optionid
        let data = {
            'optionTitle': optionTitle,
            'optionId': optionId
        }
        await sendRequest('api/editStageOption', 'PUT', data)
        window.location.reload(true)
    })
})

optionDeletes.forEach((optionDelete) => {
    optionDelete.addEventListener('click', async (e) => {
        e.preventDefault()
        let optionId = parseInt(e.target.dataset.optionid);
        let stageId = parseInt()
        let data = {
                    "optionId" : optionId,
                    };

        let response = await fetch('/api/deleteStageOption', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        
        console.log(await response.status);

        // if (false) {
        //     let stageId = e.target.dataset.stageid
        //     modal.classList.remove('hidden')
        // } else {
        //     // window.location.reload(true);
        // }

    })
});

optionAddSubmits.forEach((optionAddSubmit) => {
    optionAddSubmit.addEventListener('click', async (e) => {
        e.preventDefault()
        let inputs = e.target.parentElement.querySelectorAll('input[type="text"]')
        let stageId = e.target.dataset.stageid

        let result = {
            "data": []
        };
        inputs.forEach((input) => {
            result.data.push({
                'title': input.value,
                'stageId': stageId
            })
        })
        await sendRequest('/api/addStageOption', 'POST', result)
        window.location.reload(true)
    })
})

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
    for (var i = 0; i < ca.length; i++) {
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

optionButtons.forEach((optionButton) => {
    optionButton.addEventListener('click', (e) => {
        e.preventDefault();
        optionsContainers.forEach((optionContainer) => {
            if (optionContainer.dataset.stageid === e.target.dataset.stageid) {
                optionContainer.classList.toggle('hide')
            }
        })
    })
})

//Handler for delete button
deleteButtons.forEach((deleteButton) => {
    deleteButton.addEventListener('click', async (e) => {
        let data = {
            "id": e.target.dataset.id
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

optionEdits.forEach((optionEdit) => {
    optionEdit.addEventListener('click', (e) => {
        e.preventDefault();
        optionEditForms.forEach((optionEditForm) => {
            if (optionEditForm.dataset.optionid === e.target.dataset.optionid) {
                optionEditForm.classList.toggle('hide')
            }
        })
        e.target.parentElement.classList.toggle('hide')
    })
})

//Handler for submitting an edited stage
editForms.forEach((editForm, index) => {
    editForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let editTitleInput = e.target.firstElementChild.value;
        let id = e.target.dataset.id;
        let data = {
            "data": [{
                "id": id,
                "title": editTitleInput,
                "order": (index + 1)
            }]
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
        "title": newStage
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
            "Content-Type": "application/json"
        }
    })

    let responseData = await response.json();
    if (response.status === 500) {
        document.cookie = `response=${responseData.msg}`;
    }
}