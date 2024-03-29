const prevButtons = document.querySelectorAll('.prevButton')
const nextButtons = document.querySelectorAll('.nextButton')
const formWrappers = document.querySelectorAll('.studentApplicationFormPages')
const progressBar = document.querySelector('#progressBar')
const pageCounter = document.querySelector('#pageCounter')
const textAreaToCount = document.querySelector('#whyDev')
const textAreaCount = document.querySelector('#textAreaCount')
const startDatesCheckboxes = document.querySelectorAll('.startDatesCheckbox')

const hearAbout = formWrappers[3].querySelector('select')

formWrappers[0].classList.remove('hidden')

textAreaToCount.onkeyup = function () {
    textAreaCount.innerHTML = this.value.length;
};

startDatesCheckboxes.forEach(($checkbox) => {
    $checkbox.addEventListener('click', handleCheckbox)
})

hearAbout.addEventListener('change', handlePage4Change)

prevButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handlePrevNextClick)
})

nextButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handlePrevNextClick)

})

/**
 * Adds an event listener to the dropdown box on page 4 to un hide the extra info inputs corresponding to the Word of mouth and Other options
 */
function handlePage4Change(){
    if(this[this.selectedIndex].text === 'Word of mouth'){
        formWrappers[3].querySelector('#additionalNotesWordOfMouth').classList.remove('hidden')
    }
    else{
        formWrappers[3].querySelector('#additionalNotesWordOfMouth').classList.add('hidden')
    }
    if(this[this.selectedIndex].text === 'Other'){
        formWrappers[3].querySelector('#additionalNotesOther').classList.remove('hidden')
    }
    else{
        formWrappers[3].querySelector('#additionalNotesOther').classList.add('hidden')
    }
}

/**
 * The event listener for handling click on the previous and next buttons if the next button is clicked it runs the Page validation function for the corresponding page
 * If the page validation function returns false the next button wont navigate the user to the next page. This also changes the page number.
 * @param e
 */
function handlePrevNextClick(e){
    e.preventDefault()
    let check = true
    formWrappers.forEach((formWrapper)=>{
        if(formWrapper.id === e.currentTarget.dataset.page && e.currentTarget.dataset.buttontype === 'next') {
            check = findPageValidation(parseInt(formWrapper.id), formWrapper)
        }
    })
    if(check){
        formWrappers.forEach((formWrapper)=>{
            if(formWrapper.id === e.currentTarget.value){
                formWrapper.classList.remove('hidden')
                progressBar.setAttribute('aria-valuenow', e.currentTarget.value)
                progressBar.setAttribute('style', 'width: ' + ((e.currentTarget.value - 1) * 25) + '%')
                pageCounter.textContent = e.currentTarget.value
            }else{
                formWrapper.classList.add('hidden')
            }
        })
        pageCounter.textContent = e.currentTarget.value
    }
}

/**
 * Finds the correct validation function for a given page number and passes it the page needed.
 *
 * @param number
 * @param formWrapper
 * @returns {this is *[Boolean]}
 */
function findPageValidation(number, formWrapper){
    let output = false
    switch (number) {
        case 4:
            output = pageFourValidation(formWrapper)
            break;
        case 3:
            output = pageThreeValidation(formWrapper)
            break;
        case 2:
            output = pageTwoValidation(formWrapper)
            break;
        case 1:
            output = pageOneValidation(formWrapper)
            break;
        default:
            output = true
    }
    return output
}

/**
 * Checks all the input fields on page 1 and displays error messages if required fields arent filled in.
 *
 * @param formWrapper The div wrapping page 1
 * @returns {this is (boolean|boolean)[]}
 */
function pageOneValidation(formWrapper) {
    //selects the inputs and error messages
    let inputs = formWrapper.querySelectorAll('input')
    let dropdown = formWrapper.querySelector('select')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    //adds a hidden class to the error messages
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    // Creates an array of true/false booleans based on checks in the for each also changes the text content of the error messages based on the checks.
    let checks = [isName(inputs[0].value), isEmail(inputs[1].value), isPhoneNumber(inputs[2].value), dropdown[dropdown.selectedIndex].text !== 'Gender']
    checks.forEach((check,index)=>{
        if(!check){
            if(index === 3){
                alerts[index].textContent = 'Field Required'
            }
            else if(inputs[index].value === ''){
                alerts[index].textContent = 'Field Required'
            }else {
                alerts[index].textContent = 'Invalid ' + alerts[index].dataset.field
            }
            alerts[index].classList.remove('hidden')
        }
    })
    // returns true if all values in the array are true otherwise returns false
    return checks.every((check)=>check)
}

/**
 * Checks all the input fields on page 2 and displays error messages if required fields arent filled in.
 *
 * @param formWrapper The div wrapping page 2
 * @returns {this is boolean[]}
 */
function pageTwoValidation(formWrapper) {
    //selects the inputs and error messages
    let textArea = formWrapper.querySelector('textarea')
    let dropdown = formWrapper.querySelector('select')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    //adds a hidden class to the error messages
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    // Creates an array of true/false booleans based on checks in the for each also changes the text content of the error messages based on the checks.
    let checks = [dropdown[dropdown.selectedIndex].text !== 'Background', textArea.value.length >= 100 && textArea.value.length <= 500]
    checks.forEach((check, index)=>{
        if(!check){
            if(index === 1 && textArea.value.length > 0 && textArea.value.length < 100){
                alerts[index].textContent = 'Not enough characters'
            }
            else if(index === 1 &&  textArea.value.length > 0 && textArea.value.length > 500){
                alerts[index].textContent = 'Too many characters'
            }else{
                alerts[index].textContent = 'Field Required'
            }
            alerts[index].classList.remove('hidden')
        }
    })
    // returns true if all values in the array are true otherwise returns false
    return checks.every((check)=>check)
}

/**
 * Checks all the input fields on page 3 and displays error messages if required fields arent filled in.
 *
 * @param formWrapper The div wrapping page 3
 * @returns {this is boolean[]}
 */
function pageThreeValidation(formWrapper) {
    //selects the inputs and error messages
    let textArea = formWrapper.querySelector('textarea')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    //adds a hidden class to the error messages
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    // Creates an array of true/false booleans based on checks in the for each also changes the text content of the error messages based on the checks.
    let checks = [textArea.value.length > 0]
    checks.forEach((check, index)=>{
        if(!check){
            alerts[index].textContent = 'Field Required'
            alerts[index].classList.remove('hidden')
        }
    })
    // returns true if all values in the array are true otherwise returns false
    return checks.every((check)=>check)
}

/**
 * Checks all the input fields on page 4 and displays error messages if required fields arent filled in.
 *
 * @param formWrapper The div wrapping page 4
 * @returns {this is *[Boolean]}
 */
function pageFourValidation(formWrapper) {
    //selects the inputs and error messages
    let inputs = formWrapper.querySelectorAll('input')
    let dropdown = formWrapper.querySelector('select')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    let inputsArray = []
    let alertsArray = []
    //adds a hidden class to the error messages
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    // checks what items to add to the inputs and alerts array based on the dropdown list selection
    if(dropdown[dropdown.selectedIndex].text !== 'Other'){
        inputs.forEach((input)=>{
            if(input.id !== 'additionalNotesOtherInput'){
                inputsArray.push(input)
            }
        })
        alerts.forEach((alert)=>{
            if(alert.id !== 'additionalNotesError'){
                alertsArray.push(alert)
            }
        })
    }else{
        inputs.forEach((input)=>{
            inputsArray.push(input)
        })
        alerts.forEach((alert)=>{
            alertsArray.push(alert)
        })
    }
    // Creates an array of true/false booleans based on checks in the for each also changes the text content of the error messages based on the checks
    // Takes th value with an id additionalNotesWordOfMouthInput out of the inputs array then creates the checks
    // Creates the mini checks array from the date checkboxes
    let checks = []
    let miniCheck = []
    let toggle = true
    checks.push(dropdown[dropdown.selectedIndex].text !== 'Pick one')
    inputsArray.filter((input)=>{
        return input.id !== 'additionalNotesWordOfMouthInput'
    }).forEach((input)=>{
        if(toggle){
            if(input.classList.contains('cohort_checkbox')) {
                miniCheck.push(input.checked)
            } else {
                checks.push(input.checked)
            }
            if(input.dataset.nextcourse === 'true'){
                toggle = false
            }
        } else if(input.id === 'additionalNotesOtherInput') {
            checks.push(input.value.length > 0)
        } else {
            checks.push(input.checked)
        }
    });
    // checks if one value in the mini check array is true then returns true and adds it to the start of checks
    checks.unshift(miniCheck.some((miniCheck)=>miniCheck))
    checks.forEach((check, index)=>{
        if(!check){
            alertsArray[index].textContent = 'Field Required'
            alertsArray[index].classList.remove('hidden')
        }
    })
    // returns true if all values in the array are true otherwise returns false
    return checks.every((check)=>check)
}

/**
 *Toggles the clicked class on the date checkboxes on page 4
 *
 * @param e
 */
function handleCheckbox(e) {
    e.currentTarget.parentElement.classList.toggle('clicked')
}

/**
 *  jQuery :( responsible for setting up tooltip functionality
 */
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


