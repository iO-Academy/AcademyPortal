const edaidEditButton = document.querySelector('.edaidEditButton')
const upfrontEditButton = document.querySelector('.upfrontEditButton')
const laptopEditButton = document.querySelector('.laptopEditButton')
const githubUserEditButton = document.querySelector('.githubUserEditButton')

function handleEditClick(event) {
    const buttonName = event.target.getAttribute('class')
    const divName = buttonName.replace('EditButton', 'Container')
    const containerDiv = document.querySelector('.' + divName)
    const fieldName = divName.replace('Container', '')
    containerDiv.innerHTML = 
        '<form method="post">' +
        '<label for="' + fieldName + 'TextBox">' + containerDiv.childNodes[0].textContent + '</label>' +
        '<input type="text" id="' + fieldName + 'TextBox" name="' + fieldName + '">' + 
        '<input type="submit" value="Save">' +
        '</form>'
}

edaidEditButton.addEventListener('click', handleEditClick)

// UNCOMMENT THESE WHEN VIEWHELPER.PHP IS UPDATED WITH BUTTON ETC.
// upfrontEditButton.addEventListener('click', handleEditClick)
// laptopEditButton.addEventListener('click', handleEditClick)
// githubUserEditButton.addEventListener('click', handleEditClick)
