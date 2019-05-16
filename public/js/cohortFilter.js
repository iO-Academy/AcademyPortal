let tableRows = document.querySelectorAll('.table-row')
let applicantsDates = document.querySelectorAll('.applicants-cohort-date')

/**
 * filter through nodelist of cohort date items to hide mismatches
 *
 * @param cohortDate
 */
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

/**
 * makes dropdown select cohortDate and calls the filter function
 *
 * @return cohortDate (yyyy/mm/dd)
 */
$('.cohort-item').click(function () {
    let cohortDate = this.dataset.cohortdate
    let cohortDateNice = this.textContent
    document.querySelector('#dropdownMenu1').innerText = cohortDateNice
    clearFilter()
    applyCohortFilter(cohortDate)
    return cohortDate
})

