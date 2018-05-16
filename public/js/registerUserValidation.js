
let isValidEmail = (elementID) => {
    let inputVal = document.getElementById(elementID)
    let userEmailWarning = document.getElementById('userEmailWarning')
    let email = inputVal.value.trim();
    let regEx = new RegExp("^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$")
    if (regEx.test(email)) {
        userEmailWarning.classList.remove('error')
        return true
    } else {
        userEmailWarning.classList.add('error')
        return false
    }
}