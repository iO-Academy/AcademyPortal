
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
    formWrappers.forEach((formWrapper)=>{
        if(formWrapper.id === e.currentTarget.value){
            formWrapper.classList.remove('hidden')
        }else{
            formWrapper.classList.add('hidden')
        }
    })
    pageCounter.textContent = e.currentTarget.value
}


