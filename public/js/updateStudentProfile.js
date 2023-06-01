const studentId = document.querySelector('#studentId').dataset.studentId

const editButtons = document.querySelectorAll('.editbutton')
const saveButton = document.querySelector('#saveButton')
const confirmButtons = document.querySelectorAll('.confirm')
const cancelButtons = document.querySelectorAll('.cancel')
let updatedFields = {id: studentId}
const numberInputFields = document.querySelectorAll('.numberInputField')


function editClicked(event)
{
    const selector = event.target.dataset.selector
    event.target.parentNode.classList.add('hidden')
    const section = event.target.parentNode.parentNode
    const editable = section.querySelector('.editable' + selector)
    editable.classList.remove('hidden')
}

function confirmClicked(event)
{
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

    if (selector === 'laptop' && data.get(selector) === "1") {
        updatedHTML.innerHTML = 'Yes'
    } else if (selector === 'laptop' && data.get(selector) === "0") {
        updatedHTML.innerHTML = 'No'
    } else {
        updatedHTML.innerHTML = data.get(selector)
    }
    saveButton.classList.remove('hidden')
}


function sendEmail()
{
    fetch('/api/sendEmail?id=' + studentId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        });
}

function cancelClicked(event)
{
    event.preventDefault()
    const selector = event.target.dataset.selector
    event.target.parentNode.parentNode.classList.add('hidden')
    const plainTextContainer = document.querySelector('.' + selector + 'Container')
    plainTextContainer.classList.remove('hidden')
}

function saveClicked(event)
{
    const jsonUpdatedFields = JSON.stringify(updatedFields)
    fetch('/api/updateStudentProfile', {
        method: 'PUT',
        body: jsonUpdatedFields,
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(async(response) => {
        sendEmail()
        return response.json().then((data) => {
            if (response.status == 200) {
                location.reload()
            } else {
                const responseMessage = data.msg
                alert(responseMessage)
            }
        })
    })
}

function onlyAllowNumbers(input)
{
    if (isNaN(input.key) && input.key !== 'ArrowRight' && input.key !== 'ArrowLeft' && input.key !== 'Backspace') {
        input.preventDefault()
    }
}

editButtons.forEach(function (editButton) {
    editButton.addEventListener('click', editClicked)
})

numberInputFields.forEach(function (inputField) {
    inputField.addEventListener('keydown', onlyAllowNumbers)
})

confirmButtons.forEach(function (confirmButton) {
    confirmButton.addEventListener('click', confirmClicked)
})

cancelButtons.forEach(function (cancelButton) {
    cancelButton.addEventListener('click', cancelClicked)
})

saveButton.addEventListener('click', saveClicked)
