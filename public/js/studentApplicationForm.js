const prevButtons = document.querySelectorAll('.prevButton')
const nextButtons = document.querySelectorAll('.nextButton')
const formWrappers = document.querySelectorAll('.studentApplicationFormPages')
const pageCounter = document.querySelector('#pageCounter')
const hearAbout = formWrappers[3].querySelector('select')


formWrappers[0].classList.remove('hidden')

prevButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handleClick)
})

nextButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handleClick)
})

hearAbout.addEventListener('change', handlePage4Change)


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


function handleClick(e){
    e.preventDefault()
    let check = true
    formWrappers.forEach((formWrapper)=>{
        if(formWrapper.id === e.currentTarget.dataset.page && e.currentTarget.className === 'nextButton'){
            check = findPageValidation(parseInt(formWrapper.id), formWrapper)
        }
    })
    if(check){
        formWrappers.forEach((formWrapper)=>{
            if(formWrapper.id === e.currentTarget.value && check){
                formWrapper.classList.remove('hidden')
            }else{
                formWrapper.classList.add('hidden')
            }
        })
        pageCounter.textContent = e.currentTarget.value
    }
}

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

function pageOneValidation(formWrapper) {
    let inputs = formWrapper.querySelectorAll('input')
    let dropdown = formWrapper.querySelector('select')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    let checks = [isFullName(inputs[0].value), isEmail(inputs[1].value), isPhoneNumber(inputs[2].value), dropdown.value !== 'Gender']
    checks.forEach((check,index)=>{
        if(!check){
            if(inputs[index].value === '' || index === 3){
                alerts[index].textContent = 'Field Required'
            }else {
                alerts[index].textContent = 'Invalid ' + alerts[index].dataset.field
            }
            alerts[index].classList.remove('hidden')
        }
    })
    return checks.every((check)=>check)
}

function pageTwoValidation(formWrapper) {
    let textArea = formWrapper.querySelector('textarea')
    let dropdown = formWrapper.querySelector('select')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    let checks = [dropdown.value !== 'Background', textArea.value.length >= 100, textArea.value.length <= 500]
    checks.forEach((check, index)=>{
        if(!check){
            if(index === 1 && textArea.value.length > 0){
                alerts[index].textContent = 'Not enough characters'
            }
            else if(index === 2 && textArea.value.length > 0){
                alerts[index].textContent = 'Too many characters'
            }else{
                alerts[index].textContent = 'Field Required'
            }
            alerts[index].classList.remove('hidden')
        }
    })
    return checks.every((check)=>check)
}

function pageThreeValidation(formWrapper) {
    let textArea = formWrapper.querySelector('textarea')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    let checks = [textArea.value.length > 0]
    checks.forEach((check, index)=>{
        if(!check){
            alerts[index].textContent = 'Field Required'
            alerts[index].classList.remove('hidden')
        }
    })
    return checks.every((check)=>check)
}

function pageFourValidation(formWrapper) {
    let inputs = formWrapper.querySelectorAll('input')
    let dropdown = formWrapper.querySelector('select')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    let inputsArray = []
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    if(dropdown[dropdown.selectedIndex].text !== 'Other'){
        inputs.forEach((input)=>{
            if(input.id !== 'additionalNotesOtherInput'){
                inputsArray.push(input)
            }
        })
    }else{
        inputs.forEach((input)=>{
            inputsArray.push(input)
        })
    }
    let checks = []
    let miniCheck = []
    let toggle = true
    checks.push(dropdown.value !== 'Pick one')
    inputsArray.forEach((input)=>{
        if(toggle){
            miniCheck.push(input.checked)
            if(input.dataset.nextcourse === 'true'){
                toggle = false
            }
        } else{
            checks.push(input.checked)
        }
    });

    checks.unshift(miniCheck.some((miniCheck)=>miniCheck))
    checks.forEach((check, index)=>{
        if(!check){
            alerts[index].textContent = 'Field Required'
            alerts[index].classList.remove('hidden')
        }
    })
    return checks.every((check)=>check)
}

