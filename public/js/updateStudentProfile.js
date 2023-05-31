
const editButtons = document.querySelectorAll('.editbutton')

function editClicked(event) {
    const selector = event.target.dataset.selector
    event.target.parentNode.classList.add('hidden')
    const section = event.target.parentNode.parentNode
    const editable = section.querySelector('.editable' + selector)
    editable.classList.remove('hidden')
    const saveButton = document.querySelector('#saveButton')
    saveButton.classList.remove('hidden')
}



editButtons.forEach(function (editButton) {
    editButton.addEventListener('click', editClicked)
})


function handleEditClick(event) {


    const saveButton = document.querySelector('.saveButton')
    const form = document.querySelector('.form')
    
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        const data = new FormData(form, saveButton)
        const formData = data.get(fieldName)
        const updatedField = {
            [fieldName]: formData,
            id: studentId 
        } 
        const jsonUpdatedField = JSON.stringify(updatedField)
        fetch('/api/updateStudentProfile', {
            method: 'PUT',
            body: jsonUpdatedField,
            headers: {
                'Content-Type': 'application/json'
            }
        }).then( async (response) => { // Rayna doesn't like this
            return response.json().then((data) => {
                if(response.status == 200) {
                    location.reload()
                } else {
                    const responseMessage = data.msg
                    alert(responseMessage)
                }
            })
        })
    })
}

// edaidEditButton.addEventListener('click', handleEditClick)
// laptopEditButton.addEventListener('click', handleEditClick)
// upfrontEditButton.addEventListener('click', handleEditClick)
// githubUsernameEditButton.addEventListener('click', handleEditClick)


