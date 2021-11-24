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
    let checks = [isName(inputs[0].value), isEmail(inputs[1].value), isPhoneNumber(inputs[2].value), dropdown.value !== 'Gender']
    checks.forEach((check,index)=>{
        if(!check){
            alerts[index].classList.remove('hidden')
        }
    })
    return
}

