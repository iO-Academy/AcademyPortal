
$(document).ready(function(){
    $(".fish").click(function(){
        var url = './api/getNextStageOptions'
        fetch(url)
            .then(
                function(response) {
                    console.log('anything');
                    if (response.status !== 200) {
                        console.log('line 10');
                        document.querySelector('#modal-main').innerHTML = ''
                        document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
                            response.status + '</div>'
                        console.log('bad shit');
                        console.log(response.status);
                        return
                    }
                    // Examine the text in the response
                    response.json().then(function(data) {
console.log('line 19');
let temp =
                        data['data'].forEach(item => {
                            console.log(item.option);
                           temp = temp + '<p>item.option</p>'
                        })
                        document.querySelector('#stage-options').innerHTML = '<p>hello</p>' + '<p>fgjkhdhgkjdfhgkjd</p>'


//                         displayField(data, 'id')
//                         displayField(data, 'option')
                        let x = data['data'];
                        console.log(x[0]);
                        console.log(data['data']);

                    })
                    console.log('hi');
                }
            )

        // $("#nextStageModal").modal()
    })
})
