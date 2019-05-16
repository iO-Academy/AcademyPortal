function filterByDate (dateFrom, dateTo){
    document.querySelector('.btn.apply').addEventListener('click',function(){
        document.querySelectorAll('#applicants .applicant').forEach(row => {

            let dateCheck = row.querySelector('.dateApplied').dataset.applied;

            let applicationDateAsArray = dateCheck.split("/");

            let applicationDate = new Date(applicationDateAsArray[2], (applicationDateAsArray[0])-1, applicationDateAsArray[1]) // -1 because January = 0, December = 11

            if (applicationDate >= dateFrom && applicationDate <= dateTo) {
                row.classList.remove('hidden')
            } else {
                row.classList.add('hidden')
            }
        })
    })
}

