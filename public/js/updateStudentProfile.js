const edaidEditButton = document.querySelector('.edaidEditButton')
const upfrontEditButton = document.querySelector('.upfrontEditButton')
const laptopEditButton = document.querySelector('.laptopEditButton')
const githubUserEditButton = document.querySelector('.githubUserEditButton')
// please delete this line
const studentId = 24

function handleEditClick(event) {
    const buttonName = event.target.getAttribute('class')
    const divName = buttonName.replace('EditButton', 'Container')
    const containerDiv = document.querySelector('.' + divName)
    const fieldName = divName.replace('Container', '')
    if(divName == 'laptopContainer') {
    containerDiv.innerHTML = 
        '<form class="form" method="post">' +
        '<input type="radio" value="No" id="no" name="laptop">' +
        '<label for="no"> No</label>' +
        '<input type="radio" value="Yes" id="yes" name="laptop">' +
        '<label for="no"> Yes</label>' +
        '<input class="saveButton" type="submit" value="Save">' +
        '</form>'
    } else {
        containerDiv.innerHTML = 
        '<form class="form" method="post">' +
        '<label for="' + fieldName + 'TextBox">' + containerDiv.childNodes[0].textContent + '</label>' +
        '<input type="text" id="' + fieldName + 'TextBox" name="' + fieldName + '">' + 
        '<input class="saveButton" type="submit" value="Save">' +
        '</form>'
    }
    const saveButton = document.querySelector('.saveButton')
    const form = document.querySelector('.form')
    
    form.addEventListener('submit', (event) => {
        const data = new FormData(form, saveButton)
        const formData = data.get(fieldName)
        event.preventDefault()
        const updatedField = {
            [fieldName]: formData,
            id: studentId 
        } 
        console.log(updatedField)
        const jsonUpdatedField = JSON.stringify(updatedField)
        fetch('/api/updateStudentProfile', {
            method: 'POST',
            body: jsonUpdatedField,
            headers: {
                'Content-Type': 'application/json'
            }
        }).then((response) => {
            return response.json()
        }).then((data) => {
            if(response.status == 200) {
                header('Location: studentProfile.phtml')
            } else {
                const responseMessage = response.statusText
                console.log(responseMessage)
            }
        })
    })

}

// function handleSaveClick(event) {

// }


edaidEditButton.addEventListener('click', handleEditClick)
// saveButton.addEventListener('click', handleSaveClick)

// UNCOMMENT THESE WHEN VIEWHELPER.PHP IS UPDATED WITH BUTTON ETC.
// upfrontEditButton.addEventListener('click', handleEditClick)
laptopEditButton.addEventListener('click', handleEditClick)
// githubUserEditButton.addEventListener('click', handleEditClick)
