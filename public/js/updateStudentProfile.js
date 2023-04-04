const edaidEditButton = document.querySelector('.edaidEditButton')
const upfrontEditButton = document.querySelector('.upfrontEditButton')
const laptopEditButton = document.querySelector('.laptopEditButton')
const githubUserEditButton = document.querySelector('.githubUserEditButton')

function handleEditClick(event) {
    const buttonName = event.target.getAttribute('class')
    const divName = buttonName.replace('EditButton', 'Container')
    document.querySelector(divName).innerHTML = 
        '<form method="put">' +
        '<input type="text" aria-label="text box" name="' + divName + '">' + 
        '<input type="submit" value="Save">' +
        '</form>'
}

edaidEditButton.addEventListener('click', handleEditClick)
upfrontEditButton.addEventListener('click', handleEditClick)
laptopEditButton.addEventListener('click', handleEditClick)
githubUserEditButton.addEventListener('click', handleEditClick)
