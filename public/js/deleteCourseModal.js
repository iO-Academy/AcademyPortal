
let deleteButtons = document.querySelectorAll('.btnDeleteCourse');
for (let db of deleteButtons) {
    db.addEventListener("click", () => {
        const courseId= db.getAttribute('data-courseId');
        displayDetails('./api/deleteCourse/'+ courseId);
    });
}

function displayDetails(url) {
    fetch(url).then(
        response => {
            return response.json();
        }).then(data => {
            for (let student of data['data']) {
                generateHTML(student['name']);
            }
        }
    )
}

function generateHTML(name){
    let studentNamesContainer = document.querySelector('#studentNamesContainer')
    let studentName = document.createElement('h5');
    studentName.innerText = name;
    studentNamesContainer.appendChild(studentName);
    let reassignContainer = document.querySelector('#reassignContainer');
    let optionSelect = document.createElement('select');
    let option = document.createElement('option');
    option.innerText = 'select a course';
    optionSelect.classList.add('select-margin');
    optionSelect.appendChild(option);
    reassignContainer.appendChild(optionSelect);
}


