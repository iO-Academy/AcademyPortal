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
        let theDates = date.getAttribute('data-id')
        if(cohortDate !== theDates) {
            let row = date.parentNode
            mismatches.push(row)
        }
    })
    mismatches.forEach(function(mismatch) {
        mismatch.classList.add('hidden')
    })
}

/**
 *   resets all the hidden rows
 */
function clearFilter() {
    tableRows.forEach(function(tableRow) {
        if(tableRow.classList.contains('hidden')){
            tableRow.classList.remove('hidden')
        }
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
    document.querySelector('#cohort-dropdown-title').innerText = cohortDateNice
    clearFilter()
    applyCohortFilter(cohortDate)
    return cohortDate
})

