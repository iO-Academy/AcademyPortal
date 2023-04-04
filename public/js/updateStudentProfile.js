const edaidEditButton = document.querySelector('.edaidEditButton')
const upfrontEditButton = document.querySelector('.upfrontEditButton')
const laptopEditButton = document.querySelector('.laptopEditButton')
const githubUserEditButton = document.querySelector('.githubUserEditButton')

function handleEditClick(event) {
    const buttonName = event.target.getAttribute('class')
    const divName = buttonName.replace('EditButton', 'Container')
    const divSelector = document.querySelector('.' + divName)
    divSelector.innerHTML = 
        '<form method="put">' +
        '<label for="textBox">EdAid amount: </label>' +
        '<input type="text" id="textBox" name="' + divName + '">' + 
        '<input type="submit" value="Save">' +
        '</form>'
}

edaidEditButton.addEventListener('click', handleEditClick)

// UNCOMMENT THESE WHEN VIEWHELPER.PHP IS UPDATED WITH BUTTON ETC.
// upfrontEditButton.addEventListener('click', handleEditClick)
// laptopEditButton.addEventListener('click', handleEditClick)
// githubUserEditButton.addEventListener('click', handleEditClick)
