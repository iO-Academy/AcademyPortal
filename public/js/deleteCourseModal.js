function generateStudents(name, studentNamesContainer) {
    let studentName = document.createElement('h5');
    studentName.innerText = name;
    studentNamesContainer.appendChild(studentName);
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

function displayDetails(url) {
    fetch(url).then(
        response => {
            return response.json();
        }).then(data => {
            let studentNamesContainer = document.querySelector('#studentNamesContainer');
            studentNamesContainer.innerHTML = '<h4>Name</h4>';
            let DeleteCoursesForm = document.querySelector('#DeleteCoursesForm');
            DeleteCoursesForm.innerHTML = '';
            DeleteCoursesForm.action = url;
            let prettyCourses = formatCourseStartAndName(data['availableCourses'])
            for (let student of data['applicants']) {
                generateStudents(student['name'], studentNamesContainer);
                generateOptions(prettyCourses, DeleteCoursesForm, student['id'], data['availableCourses']);
            }
        }
    )
}

let deleteButtons = document.querySelectorAll('.btnDeleteCourse');
for (let db of deleteButtons) {
    db.addEventListener("click", () => {
        const courseId = db.getAttribute('data-courseId');
        displayDetails('./api/deleteCourse/' + courseId);
    });
}

function formatCourseStartAndName(courses) {
    let courseStartAndNameArray = [];
    for (let course of courses) {
        let courseStartAndName = course['name'] + ' ' + course['start_date'];
        courseStartAndNameArray.push(courseStartAndName);
    }
    return courseStartAndNameArray;
}
