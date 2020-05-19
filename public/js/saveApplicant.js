document.getElementById('submitApplicant').addEventListener('click', e => {
    e.preventDefault();
    let data = getCompletedFormData();
    let validate = validateFormInputs(data);
    let formIsValid = true;

    document.querySelectorAll('.formItem_alert').forEach(element => {
        element.classList.remove('alert-danger');
        element.classList.add('hidden');
        element.innerHTML = '';
    });

    Object.keys(validate).forEach(formItem => {
        let querySelector = `#${formItem}Error`;
        let formItemValues = validate[formItem];

        Object.keys(formItemValues).forEach(validationType => {
            let isValid = formItemValues[validationType];
            if (!isValid) {
                document.querySelector(querySelector).classList.add('alert-danger');
                document.querySelector(querySelector).classList.remove('hidden');
                document.querySelector(querySelector).innerHTML = errorMessage(validationType);
                formIsValid = false;
            }
        })
    });

    if (formIsValid) {
        makeApiRequest(data);
    } else {
        document.getElementById('#generalError').innerHTML = 'This form is invalid, please check all fields';
        document.querySelector('#generalError').classList.remove('hidden');
        document.querySelector('#generalError').classList.add('alert-danger');
    }
});

let errorMessage = (validationType) => {
    let htmlString = '';
    if (validationType === 'isPresent') {
        htmlString += `This is a required field, please fill in`;
    } else if (validationType === 'validLengthVarChar') {
        htmlString += `This field must be less than 255 characters`;
    } else if (validationType === 'validLengthText') {
        htmlString += `This field must be less than 10000 characters`;
    } else {
        htmlString += `This field is invalid`;
    }

    return htmlString;
};

let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".submitApplicant");
    let data = {};
    formData.forEach(formItem => {
        data[formItem.name] = formItem.value;
        if (formItem.type == 'checkbox') {
            data[formItem.name] = formItem.checked;
        }
    });

    return data;
};

let makeApiRequest = async (data) => {
    return fetch('./api/saveApplicant', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'post',
        body: JSON.stringify(data)
    }).then(response => {
        if (response.status == 200) {
            window.location.href = './admin';
        } else if (response.status == 400) {
            document.querySelector('#generalError').innerHTML = "You must fill out all form options.";
            document.querySelector('#generalError').classList.remove('hidden');
            document.querySelector('#generalError').classList.add('alert-danger');
        } else {
            document.querySelector('#generalError').innerHTML = "Something went wrong, please try again later.";
            document.querySelector('#generalError').classList.remove('hidden');
            document.querySelector('#generalError').classList.add('alert-danger');
        }
    });
}

let validateFormInputs = (data) => {
    let validate = {};

    validate.name = {validLengthVarChar: varCharMaxLength(data.name), isName: isName(data.name), isPresent: isPresent(data.name)};
    validate.email = {validLengthVarChar: varCharMaxLength(data.email), isEmail: isEmail(data.email), isPresent: isPresent(data.email)};
    validate.phone = {isPhone: isPhoneNumber(data.phoneNumber), isPresent: isPresent(data.phoneNumber)};
    validate.whyDev = {validLengthText: textAreaMaxLength(data.whyDev), isPresent: isPresent(data.whyDev)};
    validate.codeExperience = {validLengthText: textAreaMaxLength(data.codeExperience)};
    validate.notes = {validLengthText: textAreaMaxLength(data.notes)};

    return validate;
};