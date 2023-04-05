const edaidEditButton = document.querySelector('#edaidEditButton')
const upfrontEditButton = document.querySelector('#upfrontEditButton')
const laptopEditButton = document.querySelector('#laptopEditButton')
const githubUserEditButton = document.querySelector('#githubUserEditButton')
// please delete this line
const studentId = 24

function handleEditClick(event) {
    const buttonName = event.target.getAttribute('id')
    const divName = buttonName.replace('EditButton', 'Container')
    const containerDiv = document.querySelector('.' + divName)
    const fieldName = divName.replace('Container', '')
    const description = buttonName.replace('EditButton', 'Description')
    const descriptionTag = document.querySelector('#' + description)
    if(divName == 'laptopContainer') {
    containerDiv.innerHTML = 
        '<form class="form studentProfileEditableField">' +
        '<label>Laptop required: </label>' +
        '<input type="radio" value="No" id="noLaptop" name="' + fieldName + '">' +
        '<label for="noLaptop">No</label>' +
        '<input type="radio" value="Yes" id="yesLaptop" name="' + fieldName + '">' +
        '<label for="yesLaptop">Yes</label>' +
        '<input class="saveButton" type="submit" value="Save">' +
        '</form>'
    } else {
        containerDiv.innerHTML = 
        '<form class="form studentProfileEditableField">' +
        '<label for="' + fieldName + 'TextBox">' + descriptionTag.textContent + '</label>' +
        '<input type="text" id="' + fieldName + 'TextBox" name="' + fieldName + '">' + 
        '<input class="saveButton" type="submit" value="Save">' +
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

// UNCOMMENT THESE WHEN VIEWHELPER.PHP IS UPDATED WITH BUTTON ETC.
// upfrontEditButton.addEventListener('click', handleEditClick)
// githubUserEditButton.addEventListener('click', handleEditClick)
