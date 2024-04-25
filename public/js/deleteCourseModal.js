let deleteButtons = document.querySelectorAll('.btnDeleteCourse');
for (let db of deleteButtons) {
    db.addEventListener("click", () => {
        const courseId = db.getAttribute('data-courseId');
        displayDetails('./api/deleteCourse/' + courseId, courseId);
    });
}

function displayDetails(url, courseId) {
    fetch(url).then(
        response => {
            return response.json();
        }).then(data => {
            let studentNamesContainer = document.querySelector('#studentNamesContainer');
            studentNamesContainer.innerHTML = '<h4>Name</h4>';
            let DeleteCoursesForm = document.querySelector('#DeleteCoursesForm');
            DeleteCoursesForm.innerHTML = '';
            DeleteCoursesForm.action = "api/deleteCourse/" + courseId;
            let prettyCourses = makeCoursesPretty(data['availableCourses'])
            for (let student of data['applicants']) {
                generateStudents(student['name'], studentNamesContainer);
                generateOptions(prettyCourses, DeleteCoursesForm, student['id'], data['availableCourses']);
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

function generateOptions(prettyCourses, DeleteCoursesForm, studentId, courses) {
    let optionSelect = document.createElement('select');
    optionSelect.name = studentId;
    optionSelect.form = DeleteCoursesForm;
    optionSelect.classList.add('individualCourses');
    let unassignStudent = document.createElement('option');
    unassignStudent.innerText = 'Unassign Student';
    unassignStudent.value = '0';
    optionSelect.appendChild(unassignStudent);
    for (let i = 0; i < courses.length; i ++) {
        let option = document.createElement('option');
        option.innerText = prettyCourses[i];
        option.value = courses[i]['id'];
        optionSelect.appendChild(option);
    }
    DeleteCoursesForm.appendChild(optionSelect)
}

