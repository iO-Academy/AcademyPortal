
document.getElementById('formButton').addEventListener('click', function () {
    var message = ''

   var inputs = document.querySelectorAll('input')

    inputs.forEach(function (el) {
        if(el.data('min')) {
            var min = el.data('min')
            if (
                (el.length < min && el.data('required') == 'true')
                ||
                (el.length < min && el.length > 0 && !el.data('required') != 'true')
            ) {
                message += min + 'character minimum <br>'
            }
        }
    })
})

