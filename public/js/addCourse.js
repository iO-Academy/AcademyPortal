const courseForm = document.querySelector('form');
const message = document.querySelector('#messages');

// Submit Form + Add New Course API Call
courseForm.addEventListener("submit", e => {
    e.preventDefault();

    let data = getCompletedCourseFormData();
    let validate = validateCourseForm();
    if (validate) {
        fetch('./api/addCourse', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'post',
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(responseJson => {
                if (responseJson.success) {
                    courseForm.elements['startDate'].value = '',
                    courseForm.elements['endDate'].value = '',
                    courseForm.elements['name'].value = '',
                    courseForm.elements['trainer'].value = '',
                    courseForm.elements['notes'].value = '',
                    message.innerText = responseJson.message,
                    message.classList.add('alert-success'),
                    message.classList.remove('alert-danger');
                } else {
                    message.innerText = responseJson.message;
                    message.classList.add('alert-danger');
                    message.classList.remove('alert-success');
                }
            });
    }
});

/**
 * Adds data from form into an object with the field name as key and the form value as value.
 */
let getCompletedCourseFormData = () => {
    let data = {
        startDate: courseForm.elements['startDate'].value,
        endDate: courseForm.elements['endDate'].value,
        name: courseForm.elements['name'].value,
        trainer: courseForm.elements['trainer'].value,
        notes: courseForm.elements['notes'].value
    }
    return data;
}

function validateCourseForm() {
    let success = true;
    let message = '';
    let inputs = document.querySelectorAll('.create-courses');
    inputs.forEach(function (element) {
        //Checks fields with attribute data-required=true has data
        let required = element.getAttribute('data-required')
        if (required && element.value.length < 1) {
            message += element.previousElementSibling.innerHTML + ' is a required field! <br>';
            success = false;
        }
        //Checks fields with attribute data-max are within their character limit.
        let maxLength = element.getAttribute('data-max');
        if (required && maxLength != null && element.value.length > maxLength) {
            message += element.name + ' is too long, must be less than ' + maxLength + ' characters! <br>';
            success = false;
        }
        //Checks the date is in the format of a date 'YYYY-MM-DD'
        if (element.name === 'startDate' || element.name === 'endDate') {
            let date = element.value.trim();
            if (!isDate(date)) {
                message += 'Invalid date!<br>';
                success = false;
            }
        }
    });
    // check that the end date is actually after the start date
    let startDate = new Date(document.querySelector('#startDate').value);
    let endDate = new Date(document.querySelector('#endDate').value);
    if (endDate < startDate) {
        message += 'Course must not end before it begins!<br>';
        success = false;
    } else if (endDate.getDate() === startDate.getDate()) {
        message += 'Must not begin and end on the same day!<br>';
        success = false;
    }
    //Adds all error messages to the messages div.
    document.getElementById('messages').innerHTML = message;
    return success;
}