function checkLength() {
    if(data.length >= 1 && data.length <= 255){
        return true
    } else {
        return false
    }
}

$(function() {
    $('form').submit(function(e) {
        e.preventDefault()
        var submit = true
        $('.error').remove()

        $('input').each(function() {
            var $this = $(this)
            var elClass = $this.attr('class')
            var message = ''

            if ($this.data('required') && $this.val().length < 1) {
                message += 'Required Field<br>'
            } //use

            if ($this.data('max')) {
                var max = $this.data('max')
                if ($this.val().length > max) {
                    message += max + ' characters maximum<br>'
                }
            }

            if ($this.data('min')) {
                var min = $this.data('min')
                if (
                    ($this.val().length < min && $this.data('required') == 'true')
                    ||
                    ($this.val().length < min && $this.val().length > 0 && !$this.data('required') != 'true')
                ) {
                    message += min + ' character minimum<br>'
                }
            }

            //if (elClass.indexOf('alpha') !== -1) {
            //    var regex = /^[A-z\s]+$/
            //    if (!regex.test($this.val()) && $this.val().length > 0) {
            //        message += 'Letters only<br>'
            //    }
            //}
            //
            //if (elClass.indexOf('conditional') !== -1) {
            //    var targetId = elClass.match(/conditional-([A-z]+)/)[1]
            //    var $target = $('#' + targetId)
            //    var value = elClass.match(/conditional-[A-z]+-(.+)\s/)[1]
            //    if ($target.is(':checked') && $this.val().length < 1) {
            //        message +=  'Required field while ' + targetId + ' is ' + value + '<br>'
            //    }
            //}

            if (message.length > 0) {
                submit = false
                showMessage($this, message)
            }


        })

        return submit
    })
})

var showMessage = function($el, message) {
    var alert = "<div class='error'>" + message + "</div>"
    $el.after(alert);
}