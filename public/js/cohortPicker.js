$('.cohort-item').click(function () {
    let cohortDate = this.dataset.cohortdate
    let cohortDateNice = this.textContent
    document.querySelector('#cohort-dropdown-title').innerText =  cohortDateNice
    return cohortDate
})

