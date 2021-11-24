const prevButtons = document.querySelectorAll('.prevButton')
const nextButtons = document.querySelectorAll('.nextButton')
const formWrappers = document.querySelectorAll('.studentApplicationFormPages')
const pageCounter = document.querySelector('#pageCounter')
formWrappers[0].classList.remove('hidden')

prevButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handleClick)
})

nextButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handleClick)
})

function handleClick(e){
    e.preventDefault()
    let check = true
    formWrappers.forEach((formWrapper)=>{
        if(formWrapper.id === e.currentTarget.dataset.page){
            check = pageOneValidation(formWrapper)
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

function pageOneValidation(formWrapper) {
    let inputs = formWrapper.querySelectorAll('input')
    let dropdown = formWrapper.querySelector('select')
    let alerts = formWrapper.querySelectorAll('.formItem_alert')
    alerts.forEach((a) => {
        a.classList.add('hidden')
    })
    let check1 = isName(inputs[0].value)
    let check2 = isEmail(inputs[1].value)
    let check3 = isPhoneNumber(inputs[2].value)
    let check4 = dropdown.value !== 'Gender'
    if(!check1){
        alerts[0].classList.remove('hidden')
    }
    if(!check2){
        alerts[1].classList.remove('hidden')
    }
    if(!check3){
        alerts[2].classList.remove('hidden')
    }
    if(!check4){
        alerts[3].classList.remove('hidden')
    }
    return check1 && check2 && check3 && check4
}

