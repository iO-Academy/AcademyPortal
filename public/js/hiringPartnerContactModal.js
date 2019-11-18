
function validateField(data, field, noDataMessage = 'No information provided') {
    if (data[field] === '' || data[field] === null || data[field] === undefined || data[field] === 0 || data[field] === false) {
        document.getElementById(field).innerHTML = noDataMessage
    } else {
        document.getElementById(field).innerHTML = data[field]
    }
}
console.log('hello')

document.querySelectorAll('.myBtn').forEach(function(item) {
         item.addEventListener('click', function(e) {
             e.preventDefault()
             console.log('hello')
        })
})


// $(document).ready(function(){
//     $(".myBtn").click(function(e){
//         console.log('hello')
//         e.preventDefault();
//         // var url = './api/getHiringPartnerAndContactInfo/' + this.dataset.id
//         // fetch(url)
//         //     .then(
//         //         function(response) {
//         //             if (response.status !== 200) {
//         //                 document.querySelector('#modal-main').innerHTML = ''
//         //                 document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
//         //                     response.status + '</div>'
//         //                 return
//         //             }
//         //             // Examine the text in the response
//         //             response.json().then(function(data) {
//         //                 console.log(data)
//         //                 validateField(data, 'name')
//         //                 validateField(data, 'job_title')
//         //                 validateField(data, 'email')
//         //                 validateField(data, 'phone')
//         //                 validateField(data, 'is_primary_contact')
//         //             })
//         //         }
//         //     )
//         //
//         // $("#myModal").modal()
//     })
// })
