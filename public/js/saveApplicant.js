document.getElementById('submitApplicant').addEventListener('click', e => {
    e.preventDefault();
    let data = getCompletedFormData();
    let validate = validateFormInputs(data);
    let formIsValid = true;
    Object.keys(validate).forEach(formItem => {
        let itemKey = formItem;
        let querySelector = `#${itemKey}Error`;
        let formItemValues = validate[formItem];
        Object.keys(formItemValues).forEach(validationType => {
            let isValid = formItemValues[validationType];
            if (!isValid) {
                document.querySelector(querySelector).classList.add('alert-danger');
                document.querySelector(querySelector).classList.remove('hidden');
                document.querySelector(querySelector).innerHTML = errorMessage(validationType);
                formIsValid = false;
            } else {
                document.querySelector(querySelector).classList.remove('alert-danger');
                document.querySelector(querySelector).classList.add('hidden');
                document.querySelector(querySelector).innerHTML = '';
            }
        })
    });
    if (formIsValid) {
        makeApiRequest(data)
        document.querySelector('#generalError').classList.remove('alert-danger');
        document.querySelector('#generalError').classList.add('hidden');
    } else {
        document.getElementById('generalError').innerHTML = 'This form is invalid, please check all fields';
        document.querySelector('#generalError').classList.add('alert-danger');
        document.querySelector('#generalError').classList.remove('hidden');
    }
});

let errorMessage = (validationType) => {
    let htmlString = '';
    if (validationType === 'isPresent') {
        htmlString += `This is a required field, please fill in`
    } else if (validationType === 'validLengthVarChar') {
        htmlString += `This field must be less than 255 characters`
    } else if (validationType === 'validLengthText') {
        htmlString += `This field must be less than 10000 characters`
    } else {
        htmlString += `This field is invalid`
    }

    return htmlString;
};

let getCompletedFormData = () => {
    let formData = document.querySelectorAll(".submitApplicant");
    let data = {};
    formData.forEach(formItem => {
        data[formItem.name] = formItem.value;
        if (formItem.type == 'checkbox') {
            data[formItem.name] = formItem.checked
        }
    });
    return data
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
    })
        .then(response => response.json())
        .then((data) => {
            if (data.success) {
                window.location.href = './admin';
            } else {
                document.getElementById('errorMsg').innerHTML = "Please contact administrator. Or <a href='./admin'>click here</a> to return to admin page"
            }
        })
}

// let validateFormInputs = (data) => {
//     let validate = {};
//
//     validate.push(isName(data.name) && nameMaxLength(data.name));
//     validate.push(isEmail(data.email) && varCharMaxLength(data.email));
//     validate.push(isPhoneNumber(data.phoneNumber));
//     validate.push(isPresent(data.whyDev) && textAreaMaxLength(data.whyDev));
//     validate.push(isPresent(data.codeExperience) && textAreaMaxLength(data.codeExperience));
//     validate.push(textAreaMaxLength(data.notes));
//
//     return validate;
// };

let validateFormInputs = (data) => {
    let validate = {};
    console.log(typeof data.name, typeof data.whyDev);

    validate.name = {validLengthVarChar: varCharMaxLength(data.name), isName: isName(data.name), isPresent: isPresent(data.name)};
    validate.email = {validLengthVarChar: varCharMaxLength(data.email), isEmail: isEmail(data.email), isPresent: isPresent(data.email)};
    validate.phone = {isPhone: isPhoneNumber(data.phoneNumber), isPresent: isPresent(data.phone)};
    validate.whyDev = {validLengthText: textAreaMaxLength(data.whyDev), isPresent: isPresent(data.whyDev)};
    validate.codeExperience = {validLengthText: textAreaMaxLength(data.codeExperience)};
    validate.notes = {validLengthText: textAreaMaxLength(data.notes)};

    return validate;
};