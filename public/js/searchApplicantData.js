document.querySelector('#searchBar').addEventListener("input", function () {
    let textSearch = document.querySelector('#searchBar').value

    document.querySelectorAll('#applicants .applicant').forEach(row => {

        let childNodes = row.childNodes
        let nameField = childNodes[1].innerText
        let emailField = childNodes[3].innerText
        let regex = new RegExp(textSearch, 'gi')
        let doesExistInName = nameField.match(regex)
        let doesExistInEmail = emailField.match(regex)

        if (doesExistInName != null && doesExistInName.length > 0 || doesExistInEmail != null && doesExistInEmail.length > 0) {
            row.classList.remove('hidden')
        } else {
            row.classList.add('hidden')
        }
    })
})








