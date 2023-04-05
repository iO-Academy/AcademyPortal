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
        '<input type="text" id="' + fieldName + 'TextBox" class="form-control" name="' + fieldName + '">' + 
        '<input type="submit" value="Save" class="btn-primary btn btn-sm">' +
        '</form>'
}

// function handleEditClick(event) {
//     const buttonName = event.target.getAttribute('class')
//     const divName = buttonName.replace('EditButton', 'Container')
//     const containerDiv = document.querySelector('.' + divName)
//     const fieldName = divName.replace('Container', '')
//     containerDiv.innerHTML = 
//         '<form method="post">' +
//         '<label for="' + fieldName + 'TextBox">' + containerDiv.childNodes[0].textContent + '</label>' +
//         '<input type="submit" value="Save" class="btn-primary btn btn-sm" style="float: right">' +
//         '<div style="overflow: hidden; padding-right: .5em;">' +
//             '<input type="text" id="' + fieldName + 'TextBox" class="form-control" name="' + fieldName + '">' +
//         '</div>' + 
//         '</form>'
// }

{/* <input type="submit"value="Find" style="float: right" />
<div style="overflow: hidden; padding-right: .5em;">
   <input type="text" style="width: 100%;" />
</div> */}

edaidEditButton.addEventListener('click', handleEditClick)

// UNCOMMENT THESE WHEN VIEWHELPER.PHP IS UPDATED WITH BUTTON ETC.
// upfrontEditButton.addEventListener('click', handleEditClick)
// laptopEditButton.addEventListener('click', handleEditClick)
// githubUserEditButton.addEventListener('click', handleEditClick)

// Styling the input text box and save button - merge with t4 edit buttons, remove our demo button from viewhelper and uncomment additional event listeners in js file
