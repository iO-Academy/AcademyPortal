
document.querySelectorAll(".event .lower").forEach(function(event) {
    event.dataset.height = event.clientHeight
    event.style.height = 0
})

document.querySelectorAll('.event').forEach(function(event) {
    let clicked = 0
    event.addEventListener('click', function() {
        clicked++
        let lower = this.querySelector('.lower')
        let arrow = this.querySelector('.arrowBox')
        if(clicked % 2) {
            arrow.innerHTML = '<span>&#x21E7;</span>'

            var id = setInterval(function() {
                if (lower.clientHeight < (parseInt(lower.dataset.height))) {
                    lower.style.height = (parseInt(lower.style.height) + 10) + 'px'
                } else {
                    clearInterval(id)
                }

            }, 16)
        }
        else {
            arrow.innerHTML = '<span>&#x21E9;</span>'

            var id = setInterval(function() {
                if (lower.clientHeight > 0) {
                    lower.style.height = (parseInt(lower.style.height) - 10) + 'px'
                }
                else {
                    clearInterval(id)
                }
            }, 16)
        }
    })
})