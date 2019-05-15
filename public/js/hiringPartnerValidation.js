



document.getElementById('hiringPartnerForm').addEventListener('submit', function (e) {
    e.preventDefault()
    validateForm();
})

function validateForm() {

    let inputs = document.querySelectorAll('.submitHiringPartner')
    inputs.forEach(function (element) {

        let required = element.getAttribute('data-required')

        if (required && element.value.length < 1) {
            element.placeholder = 'THIS IS WRONG YOU TOOL'
            console.log('BAD, VERY BAD')
            //it's BAD! - make this clear
        }

        let maxLength = element.getAttribute('data-max')
        if (required && element.value.length > maxLength) {

            element.placeholder = 'THIS IS WRONG YOU TOOL'
            //it's BAD! - make this clear
        }


    })
}


///outputting error messages!