const categoryForm = document.querySelector('form');
const message = document.querySelector('#messages');

// Submit Form + Add New Event API Call
categoryForm.addEventListener('submit', e => {
    e.preventDefault()
    const errorDivs = document.querySelectorAll('.alert');
    errorDivs.forEach(errorDiv => {
        errorDiv.classList.add('hidden');
    })

    let data = getCompletedFormData();
    let validatedFormItems = validateCategoryInput(data);

    let formIsValid = true;
    Object.keys(validatedFormItems).forEach(formItemKey => {
        const errorDiv = document.querySelector(`#${formItemKey}Error`);
        let formItemValues = validatedFormItems[formItemKey];
        let keys = Object.keys(formItemValues);
        for (let i = 0; i < keys.length; i++) {
            let key = keys[i];
            let isValid = formItemValues[key];
            if (!isValid) {
                errorDiv.classList.add('alert-danger');
                errorDiv.classList.remove('hidden');
                errorDiv.innerHTML = errorMessage(key);
                formIsValid = false;
                message.classList.add('hidden');
                break;
            }
        }
    });
    if (formIsValid) {
        // send it!
        fetch('./api/addCategory', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'post',
            body: JSON.stringify(data)
        })
            .then(response => {
                return response.json()
            })
            .then(responseJson => {
                if (responseJson.success) {
                    categoryForm.elements['addCategory'].value = ''
                    message.innerText = responseJson.message
                    formSubmitSuccess(message)
                } else {
                    message.innerText = responseJson.message
                    message.classList.add('alert-danger')
                    message.classList.remove('alert-success')
                    message.classList.remove('hidden')
                }
            })
    }
});

/**
 * Adds data from form into an object with the field name as key and the form value as value.
 */
let getCompletedFormData = () => {
    return {
        courseCategory: categoryForm.elements['addCategory'].value
    };
}

let validateCategoryInput = (data) => {
    return {
        courseCategory: {
            isPresent: isPresent(data.courseCategory),
            isName: isName(data.courseCategory),
            validLengthVarChar: varCharMaxLength(data.courseCategory)
        }
    };
};

