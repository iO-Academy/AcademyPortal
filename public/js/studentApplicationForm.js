
const prevButtons = document.querySelectorAll('.prevButton')
const nextButtons = document.querySelectorAll('.nextButton')
const formWrappers = document.querySelectorAll('.studentApplicationFormPages')
const progressBar = document.querySelector('#progressBar')
const pageCounter = document.querySelector('#pageCounter')
const textAreaToCount = document.querySelector('#whyDev')
const textAreaCount = document.querySelector('#textAreaCount')
const startDatesCheckboxes = document.querySelectorAll('.startDatesCheckbox')


formWrappers[0].classList.remove('hidden')

prevButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handleClick)
})

nextButtons.forEach(($prevButton) => {
    $prevButton.addEventListener('click', handleClick)

})

function handleClick(e){
    e.preventDefault()
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
}

textAreaToCount.onkeyup = function () {
    textAreaCount.innerHTML = this.value.length;
};


startDatesCheckboxes.forEach(($checkbox) => {
    $checkbox.addEventListener('click', handleCheckbox)
})

function handleCheckbox(e) {
    if (e.currentTarget.checked) {
        e.currentTarget.parentElement.classList.add('clicked')
    } else {
        e.currentTarget.parentElement.classList.remove('clicked')
    }
}


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

