let deleteButtons = document.querySelectorAll('.btnDeleteCourse');
for (let db of deleteButtons) {
    db.addEventListener("click", () => {
        const courseId = db.getAttribute('data-courseId');
        displayDetails('./api/deleteCourse/' + courseId);
    });
}

function displayDetails(url) {
    fetch(url).then(
        response => {
            return response.json();
        }).then(data => {
            let studentNamesContainer = document.querySelector('#studentNamesContainer');
            let reassignContainer = document.querySelector('#reassignContainer');
            studentNamesContainer.innerHTML = '<h4>Name</h4>';
            reassignContainer.innerHTML = '<h4>Reassign Student</h4>';
            let prettyCourses = makeCoursesPretty(data['availableCourses'])
            for (let student of data['applicants']) {
                generateStudents(student['name'], studentNamesContainer);
                generateOptions(prettyCourses, reassignContainer);
            }
        }
    )
}

function generateStudents(name, studentNamesContainer) {
    let studentName = document.createElement('h5');
    studentName.innerText = name;
    studentNamesContainer.appendChild(studentName);
}

function makeCoursesPretty(courses) {
    let prettyCoursesArray = [];
    for (let course of courses) {
        let prettyCourse = course['name'] + ' ' + course['start_date'];
        prettyCoursesArray.push(prettyCourse);
    }
    return prettyCoursesArray;
}

function generateOptions(courses, reassignContainer) {
    let optionSelect = document.createElement('select');
    for (let course of courses) {
        let option = document.createElement('option');
        option.innerText = course;
        optionSelect.appendChild(option);
    }
    reassignContainer.appendChild(optionSelect)
}

