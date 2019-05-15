//
// document.querySelector("#submitHiringPartner").addEventListener('submit', function () {


document.getElementById('hpFrom').addEventListener('submit', function (e) {
e.preventDefault()
    var message = ''

    var inputs = document.querySelectorAll('input')

    for (i = 0; i < inputs.length; i++)
    {
        if(inputs[i].getAttribute('data-min')){
            var min = inputs[i].getAttribute('data-min')
            if (inputs[i].value.length < min && inputs[i].getAttribute('data-required') === 'true') {
                message += min + ' character minimum <br>'
            }
        }
    }
    console.log(message)
    document.getElementById('message').innerHTML = message
})

let isValidCompanyName = (inputEmail) => {
    let email = inputEmail.trim()
    let regEx = new RegExp("^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+$")
    return regEx.test(email)
}


// })

    //

    //
    // console.log(this.getAttribute('data-required'))
    // if(this.data('min')) {
    //     var min = this.data('min')
    //     if (
    //         (this.length < min && this.data('required') === 'true')
    //         ||
    //         (this.length < min && this.length > 0 && !this.data('required') !== 'true')
    //     ) {
    //         message += min + 'character minimum <br>'
    //     }
    // }









// console.log(document.querySelector("#formButton"))

// inputs[i].getAttribute('data-required') === 'true'

// var showMessage = function($el, message) {
//     var alert = "<div class='error'>" + message + "</div>"
//     $el.after(alert);

