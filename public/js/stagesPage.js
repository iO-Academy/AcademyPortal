const editButtons = document.querySelectorAll('.toggleEditForm');
const editForms = document.querySelectorAll('.stagesTableForm');
const newStageForm = document.getElementById('newStageForm');
const deleteButtons = document.querySelectorAll('.delete');
const optionButtons = document.querySelectorAll('.toggleEditOptions');
const optionEditSubmits = document.querySelectorAll('.optionEditSubmit');
const optionEdits = document.querySelectorAll('.optionEdit');
const optionDeletes = document.querySelectorAll('.optionDelete');
const optionAddSubmits = document.querySelectorAll('.optionAddSubmit');
const optionsContainers = document.querySelectorAll('.optionsContainer');
const optionEditForms = document.querySelectorAll('.optionTableForm');
const stageLocks = document.querySelectorAll('.stageLock');

// Set up the modal for deleting the final option
const modal = document.querySelector('.modalContainer');
const closeModal = document.querySelector('.closeModal');
closeModal.addEventListener('click', (e) => {
    e.preventDefault();
    window.location.reload();
})
const deleteAllOptions = document.querySelector('.deleteAllOptions');

optionEditSubmits.forEach((optionEditSubmit) => {
    optionEditSubmit.addEventListener('click', async (e) => {
        e.preventDefault()
        let optionTitle = e.target.parentElement.querySelector('.optionEditTitle').value
        let optionId = e.target.dataset.optionid
        let data = {
            'option': optionTitle,
            'optionId': optionId
        }
        await fetch('./api/editStageOption', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        window.location.reload()
    })
})

optionDeletes.forEach((optionDelete) => {
    optionDelete.addEventListener('click', async (e) => {
        e.preventDefault()
        let optionId = parseInt(e.target.dataset.optionid);
        let stageId = parseInt(e.target.dataset.stageid);
        let data = {
            "optionId" : optionId,
            "stageId" : stageId
        };

        let response = await fetch('./api/deleteStageOption', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        
        if (await response.status == 202) {
            modal.classList.remove('hidden');
            deleteAllOptions.addEventListener('click', async (e) => {
                e.preventDefault();
                let data = {
                    "stageId" : stageId
                };
                await fetch('./api/deleteAllStageOptions', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                window.location.reload();
            })
        } else {
            window.location.reload();
        }
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
                'option': input.value,
                'stageId': stageId
            })
        })
        await fetch('./api/addStageOption', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(result)
        });
        window.location.reload()
    })
})

optionButtons.forEach((optionButton) => {
    optionButton.addEventListener('click', (e) => {
        e.preventDefault();
        optionsContainers.forEach((optionContainer) => {
            if (optionContainer.dataset.stageid === e.target.dataset.stageid) {
                optionContainer.classList.toggle('hidden')
            }
        })
    })
})

deleteButtons.forEach(deleteBtn => {
    deleteBtn.addEventListener('click', (e) => {
        const id = e.target.dataset.id;
        fetch('/api/deleteStage', {
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
                optionEditForm.classList.toggle('hidden')
            }
        })
        e.target.parentElement.classList.toggle('hidden')
    })
})

//Handler for submitting an edited stage
editForms.forEach((editForm, index) => {
    editForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = {
            "data": [{
                "id": e.target.dataset.id,
                "title": e.target.querySelector('.stageEditTitle').value,
                "order": (index + 1),
                "student": e.target.querySelector('[name="student"]').selected,
                "withdrawn": e.target.querySelector('[name="withdrawn"]').selected,
                "rejected": e.target.querySelector('[name="rejected"]').selected,
                "notAssigned": e.target.querySelector('[name="notAssigned"]').selected
            }]
        };
        await sendRequest('./api/updateStages', 'PUT', data);
        window.location.reload();
    })
});

//Handler for submitting a new stage
newStageForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    let data = {
        "title": e.target.querySelector('[name="createNewStageTextBox"]').value,
        "student": e.target.querySelector('[name="student"]').selected,
        "withdrawn": e.target.querySelector('[name="withdrawn"]').selected,
        "rejected": e.target.querySelector('[name="rejected"]').selected,
        "notAssigned": e.target.querySelector('[name="notAssigned"]').selected
    };
    await sendRequest('./api/createStage', 'POST', data);
    window.location.reload();
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

$(document).ready(function(){
    $("#stageDeletionModalCancel").click(function(){
        $('#stageDeletionModal').modal('hide');
    })

    $('.stageLock').click(function(){
        //if locked
        if ($(this).attr('data-locked') === '1') {
            let currentLockStatus = $(this);
            $('#stageDeletionModal').modal('show');
            $("#stageDeletionModalYes").off('click');
            $("#stageDeletionModalYes").on('click',function() {
                currentLockStatus.attr('data-locked', '0');
                currentLockStatus.find('svg').removeClass('fa-lock');
                currentLockStatus.find('svg').addClass('fa-lock-open');

                let currentStageId = currentLockStatus.attr('data-stageId')
                $('.delete').each(function () {
                    if ($(this).attr('data-id') === currentStageId && $(this).attr('data-hasOptions') === '0')  {
                        $(this).removeClass('disabled')
                    }
                })
                $('#stageDeletionModal').modal('hide');
            })
        } else {
            //if padlock is unlocked -> locked, data-locked = 1, change icon, disable delete button
            $(this).attr('data-locked', "1")
            $(this).find('svg').removeClass('fa-lock-open')
            $(this).find('svg').addClass('fa-lock')

            let currentStageId = $(this).attr('data-stageId')
            $('.delete').each(function(){
                if ($(this).attr('data-id') === currentStageId) {
                    $(this).addClass('disabled')
                }
            })
        }
    })
})

