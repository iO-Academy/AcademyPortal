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

    const formContainer = event.target.parentNode.parentNode
    const form = formContainer.querySelector('.form')
    const data = new FormData(form, event.target)
    updatedFields[selector] = data.get(selector)
    const updatedHTML = document.querySelector('#' + selector + 'Displayed')
    updatedHTML.innerHTML = data.get(selector)
}

function saveClicked(event) {
    event.preventDefault()
    const jsonUpdatedFields = JSON.stringify(updatedFields)
    fetch('/api/updateStudentProfile', {
        method: 'PUT',
        body: jsonUpdatedFields,
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
}


editButtons.forEach(function (editButton) {
    editButton.addEventListener('click', editClicked)
})

confirmButtons.forEach(function (confirmButton) {
    confirmButton.addEventListener('click', confirmClicked)
})

saveButton.addEventListener('click', saveClicked)


