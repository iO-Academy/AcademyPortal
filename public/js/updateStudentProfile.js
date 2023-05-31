
const editButtons = document.querySelectorAll('.editbutton')


function editClicked(event) {
    const selector = event.target.dataset.selector
    event.target.parentNode.classList.add('hidden')
    const section = event.target.parentNode.parentNode
    const editable = section.querySelector('.editable' + selector)
    editable.classList.remove('hidden')
}

editButtons.forEach(function (editButton) {
    editButton.addEventListener('click', editClicked)
})


function handleEditClick(event) {
    // const buttonName = event.target.getAttribute('id')
    // const divName = buttonName.replace('EditButton', 'Container')
    // const containerDiv = document.querySelector('.' + divName)
    // const fieldName = divName.replace('Container', '')
    // const description = buttonName.replace('EditButton', 'Description')
    // const descriptionTag = document.querySelector('#' + description)
    // if(divName == 'laptopContainer') {
    // containerDiv.innerHTML =
    //     '<form class="form studentProfileEditableField">' +
    //     '<label>Laptop required: </label>' +
    //     '<div>' +
    //     '<input type="radio" value="0" id="noLaptop" name="' + fieldName + '">' +
    //     '<label for="noLaptop">No</label>' +
    //     '<input type="radio" value="1" id="yesLaptop" name="' + fieldName + '">' +
    //     '<label for="yesLaptop">Yes</label>' +
    //     '</div>' +
    //     '<input class="saveButton btn btn-sm btn-primary" type="submit" value="Save">' +
    //     '</form>'
    // } else if (divName == 'githubUsernameContainer') {
    //     containerDiv.innerHTML =
    //     '<form class="form studentProfileEditableField">' +
    //     '<label for="' + fieldName + 'TextBox">' + descriptionTag.textContent + '</label>' +
    //     '<input type="text" id="' + fieldName + 'TextBox" name="' + fieldName + '">' +
    //     '<input class="saveButton btn btn-primary btn-sm" type="submit" value="Save">' +
    //     '</form>'
    // } else {
    //     containerDiv.innerHTML =
    //     '<form class="form studentProfileEditableField">' +
    //     '<label for="' + fieldName + 'TextBox">' + descriptionTag.textContent + '</label>' +
    //         '<input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, \'\')" id="' + fieldName + 'TextBox" name="' + fieldName + '">' +
    //         '<input class="saveButton btn btn-primary btn-sm" type="submit" value="Save">' +
    //     '</form>'
    // }

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


