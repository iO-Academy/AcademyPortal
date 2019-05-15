function filterByDate (dateFrom, dateTo){
    document.querySelectorAll('#applicants .applicant').forEach(row => {

        var dateCheck = row.querySelector('.dateApplied').dataset.applied;

        //console.log(dateCheck)

        var applicationDateAsArray = dateCheck.split("/");

        var applicationDate = new Date(applicationDateAsArray[2], (applicationDateAsArray[0])-1, applicationDateAsArray[1]) // -1 because January = 0, December = 11

        if (applicationDate >= dateFrom && applicationDate <= dateTo) {
        } else {
            row.classList += " hidden"
        }
    })

}

