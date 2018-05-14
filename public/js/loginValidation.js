
function isValidEmail(elementID) {
    let inputVal = document.getElementById(elementID);
    let email = inputVal.value.trim();
    let re = new RegExp("^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$");

    if (re.test(email)) {
        inputVal.style.backgroundColor = "";
        return true
    } else {
        inputVal.style.backgroundColor = "pink";
        return false
    }
}

function checkRequiredField(elementID) {
    let inputVal = document.getElementById(elementID);

    if (inputVal.value.trim() == "") {
        inputVal.style.backgroundColor = "pink";
        return false;
    }
    else{
        inputVal.style.backgroundColor = "";
        return true;
    }
}

function validateForm() {
    if (checkRequiredField('userEmail') && isValidEmail('userEmail') && checkRequiredField('password')) {
        document.getElementById('submitWarning').textContent = 'Form is Goooood!'
    } else {
        document.getElementById('submitWarning').textContent = 'Field input error'
    }
}

document.getElementById('formID').addEventListener('submit', function(e){
    e.preventDefault();
    validateForm();
});

