
function isEmpty(elementID) {
    var textIn = document.getElementById(elementID).value.trim();
    if (textIn == "" || textIn == null){
        return true;
    } else {
        return false;
    }
}


function isValidEmail(elementID) {
    var inputVal = document.getElementById(elementID);
    var email = inputVal.value;
    var validFormat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (validFormat.test(email)) {
        inputVal.style.backgroundColor = "";
        return true
    } else {
        inputVal.style.backgroundColor = "pink";
        return false
    }
}

function checkRequiredField(elementID) {
    var inputVal = document.getElementById(elementID);
    if (inputVal.value.trim() == "" || isEmpty(elementID) ) {
        inputVal.style.backgroundColor = "pink";
        return true;
    }
    else{
        inputVal.style.backgroundColor = "";
        return false;
    }
}



function outOfRange(elementID, MinChar, MaxChar) {
    var inputVal = document.getElementById(elementID);
    if (inputVal.value.length < MinChar || inputVal.value.length > MaxChar) {
        inputVal.style.backgroundColor = "yellow";
        return true;
    } else {
        inputVal.style.backgroundColor = "";
        return false;
    }
}




//Add event listener on the button Submit
//get Form Element using its ID
document.getElementById('formID').addEventListener('submit', function(e){
    e.preventDefault();
    validateForm();
});
