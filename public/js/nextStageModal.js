
$(document).ready(function(){
    $(".fish").click(function(){
        var url = './api/getNextStageOptions'
        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        document.querySelector('#modal-main').innerHTML = ''
                        document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
                            response.status + '</div>'
                        return
                    }
                    // Examine the text in the response
                    response.json().then(function(data) {
console.log('line 19');
                        let optionValues = "";
                        data['data'].forEach(item => {
                            optionValues += `<option value="${item.id}">${item.option}</option>`
                        })
                        document.querySelector('#next-stage-options').innerHTML += optionValues
                    })
                }
            )
    })
})
