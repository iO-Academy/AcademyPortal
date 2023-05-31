const studentId = document.querySelector('#studentId').dataset.studentId

const editButtons = document.querySelectorAll('.editbutton')
const saveButton = document.querySelector('#saveButton')
const confirmButtons = document.querySelectorAll('.confirm')
let updatedFields = {id: studentId}

function editClicked(event) {
    const selector = event.target.dataset.selector
    event.target.parentNode.classList.add('hidden')
    const section = event.target.parentNode.parentNode
    const editable = section.querySelector('.editable' + selector)
    editable.classList.remove('hidden')
    saveButton.classList.remove('hidden')
}

function confirmClicked(event) {
    event.preventDefault()
    const selector = event.target.dataset.selector
    event.target.parentNode.parentNode.classList.add('hidden')
    const section = event.target.parentNode.parentNode.parentNode
    const container = section.querySelector('.' + selector + 'Container')
    container.classList.remove('hidden')


    const form = document.querySelector(input)
    console.log(form)
    const data = new FormData(form, event.target)
    console.log(data)

}


editButtons.forEach(function (editButton) {
    editButton.addEventListener('click', editClicked)
})

confirmButtons.forEach(function (confirmButton) {
    confirmButton.addEventListener('click', confirmClicked)
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


