const edaidEditButton = document.querySelector('#edaidEditButton')
const upfrontEditButton = document.querySelector('#upfrontEditButton')
const laptopEditButton = document.querySelector('#laptopEditButton')
const githubUserEditButton = document.querySelector('#githubUserEditButton')

function handleEditClick(event) {
    const buttonName = event.target.getAttribute('id')
    const divName = buttonName.replace('EditButton', 'Container')
    const containerDiv = document.querySelector('.' + divName)
    console.log(containerDiv)
    const fieldName = divName.replace('Container', '')
    const description = buttonName.replace('EditButton', 'Description')
    const descriptionTag = document.querySelector('#' + description)
    if(divName == 'laptopContainer') {
    containerDiv.innerHTML = 
        '<form class="form studentProfileEditableField">' +
        '<label>Laptop required: </label>' +
        '<div>' +
        '<input type="radio" value="No" id="noLaptop" name="' + fieldName + '">' +
        '<label for="noLaptop">No</label>' +
        '<input type="radio" value="Yes" id="yesLaptop" name="' + fieldName + '">' +
        '<label for="yesLaptop">Yes</label>' +
        '</div>' +
        '<input class="saveButton btn btn-sm btn-primary" type="submit" value="Save">' +
        '</form>'
    } else {
        containerDiv.innerHTML = 
        '<form class="form studentProfileEditableField">' +
        '<label for="' + fieldName + 'TextBox">' + descriptionTag.textContent + '</label>' +
        '<input type="text" id="' + fieldName + 'TextBox" name="' + fieldName + '">' + 
        '<input class="saveButton  btn btn-primary btn-sm" type="submit" value="Save">' +
        '</form>'
    }

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
        }).then((response) => {
            return response.json()
        }).then((data) => {
            if(response.status == 200) {
                location.reload()
            } else {
                const responseMessage = response.statusText
                console.log(responseMessage)
            }
        })
    })
}

edaidEditButton.addEventListener('click', handleEditClick)
laptopEditButton.addEventListener('click', handleEditClick)
upfrontEditButton.addEventListener('click', handleEditClick)
githubUserEditButton.addEventListener('click', handleEditClick)
