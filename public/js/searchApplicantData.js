document.querySelector('#searchBar').addEventListener("input", function () {
    let textSearch = document.querySelector('#searchBar').value

    document.querySelectorAll('#applicants .applicant').forEach(row => {

        let textCheck = document.querySelectorAll('.searchable')
        console.log ("textCheck")
    })
    // let textSearchAsArray =




})








// var dateCheck = row.querySelector('.dateApplied').dataset.applied;
//
// //console.log(dateCheck)
//
// var applicationDateAsArray = dateCheck.split("/");
//
// var applicationDate = new Date(applicationDateAsArray[2], (applicationDateAsArray[0])-1, applicationDateAsArray[1]) // -1 because January = 0, December = 11
//
// if (applicationDate >= dateFrom && applicationDate <= dateTo) {
//     row.classList.remove('hidden')
// } else {
//     row.classList.add('hidden')
// }