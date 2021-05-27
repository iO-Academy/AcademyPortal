document.querySelector('#submitApplicant').addEventListener('click', e => {
    e.preventDefault();
    const data = getCompletedFormData();
    const validate = validateFormInputs(data);
    let formIsValid = true;


    document.querySelectorAll('.formItem_alert').forEach(element => {
        element.classList.remove('alert-danger');
        element.classList.add('hidden');
        element.innerHTML = '';
    });

    Object.keys(validate).forEach(formItem => {
        const querySelector = document.querySelector(`#${formItem}Error`);
        let formItemValues = validate[formItem];

        Object.keys(formItemValues).forEach(validationType => {
            let isValid = formItemValues[validationType];
            if (!isValid) {
                querySelector.classList.add('alert-danger');
                querySelector.classList.remove('hidden');
                querySelector.innerHTML = errorMessage(validationType);
                formIsValid = false;
            }
        })
    });

    if (formIsValid) {
        makeApiRequest(data, window.location.pathname);
    } else {
        document.querySelector('#generalError').innerHTML = 'This form is invalid, please check all fields';
        document.querySelector('#generalError').classList.remove('hidden');
        document.querySelector('#generalError').classList.add('alert-danger');
    }
});

let errorMessage = (validationType) => {
    let htmlString = '';

    switch (validationType) {
        case 'isPresent' :
            htmlString += `This is a required field, please fill in`;
            break;
        case 'validLengthVarChar' :
            htmlString += `This field must be less than 255 characters`;
            break;
        case 'validLengthText':
            htmlString += `This field must be less than 10000 characters`;
            break;
        default:
            htmlString += `This field is invalid`;
            break;
    }

    return htmlString;
};

let getCompletedFormData = () => {
    const formData = document.querySelectorAll(".submitApplicant");
    let data = {cohortId:new Array()};
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    data['id'] = urlParams.get('id');

    formData.forEach(formItem => {
        if (formItem.name == 'stageId') {
            let stageOptionArray = formItem.value.split(" ");
            data['stageId'] = stageOptionArray[0];
            data['stageOptionId'] = stageOptionArray[1] ?? null;
        }
        else {
            if (formItem.type == 'checkbox') {
                if(formItem.name == 'cohortId' && formItem.checked) {
                    data['cohortId'].push(formItem.value)
                } else {
                    data[formItem.name] = formItem.checked;
                }
            } else {
                data[formItem.name] = formItem.value;
            }
        }
    });
    return data;
};

let makeApiRequest = async (data, type) => {
    const path = './api/' + (type === '/addApplicant' ? 'saveApplicant' : 'editApplicant');
    return fetch(path, {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        method: 'post',
        body: JSON.stringify(data)
    })
        .then(response => {
        const generalErrorMessage = document.querySelector('#generalError');

        switch (response.status) {
            case 200:
                response.json().then(data => {
                    generalErrorMessage.innerHTML = data.msg;
                    generalErrorMessage.classList.add('alert-success');
                });
                break;
            case 400:
                response.json().then(data => {
                    generalErrorMessage.innerHTML = data.msg;
                    generalErrorMessage.classList.add('alert-danger');
                });
                break;
            default:
                generalErrorMessage.innerHTML = "Something went wrong, please try again later.";
                generalErrorMessage.classList.add('alert-danger');
                break;
        }
        generalErrorMessage.classList.remove('hidden');
    });
};

let validateFormInputs = (data) => {
    let validate = {};

    validate = {
        name: {
            validLengthVarChar: varCharMaxLength(data.name),
            isName: isName(data.name),
            isPresent: isPresent(data.name)
        },
        email: {
            validLengthVarChar: varCharMaxLength(data.email),
            isEmail: isEmail(data.email),
            isPresent: isPresent(data.email)
        },
        phone: {
            isPhone: isPhoneNumber(data.phoneNumber)
        } ,
        whyDev: {
            validLengthText: textAreaMaxLength(data.whyDev),
            isPresent: isPresent(data.whyDev)
        },
        codeExperience: {
            validLengthText: textAreaMaxLength(data.codeExperience)
        },
        notes: {
            validLengthText: textAreaMaxLength(data.notes)
        }
    };
    
    return validate;
};
