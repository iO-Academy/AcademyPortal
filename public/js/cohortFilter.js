let tableRows = document.querySelectorAll('.table-row')
let applicantsDates = document.querySelectorAll('.applicants-cohort-date')

function applyCohortFilter(cohortDate) {
    let mismatches = [];
    applicantsDates.forEach(function (date, index) {
        if(cohortDate !== date.innerHTML) {
            let row = date.parentNode
            mismatches.push(row)
        }
    })
    mismatches.forEach(function(mismatch) {
        mismatch.classList.add('hidden')
    })
}

function clearFilter() {
    tableRows.forEach(function(tableRow) {
        if(tableRow.classList.contains('hidden')){
            tableRow.classList.remove('hidden')
        }
    })
}

$('.cohort-item').click(function () {
    let cohortDate = this.dataset.cohortdate
    let cohortDateNice = this.textContent
    document.querySelector('#cohort-dropdown-title').innerText = cohortDateNice
    clearFilter()
    applyCohortFilter(cohortDate)
    return cohortDate
})

