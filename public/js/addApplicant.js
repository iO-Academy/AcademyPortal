let getFormOptions = () => {
 
    return fetch('/api/applicationForm', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
}

let handleFormOptions = async () => {
    let response = await getFormOptions()

    return response.data
}

let outputCohorts = async () => {
    let data = await handleFormOptions(),
        cohorts = document.getElementById('cohorts'),
        cohortOptions = data.cohorts.map(cohort => 
            `<option value="${cohort.id}">${cohort.date}</option>`
        )

    cohorts.innerHTML = cohortOptions.join('')
}

let outputHearAbout = async () => {
    let data = await handleFormOptions(),
        hearAbout = document.getElementById('hear-about'),
        hearAboutOptions = data.hearAbout.map(hearAbout =>
            `<option value="${hearAbout.id}">${hearAbout.hearAbout}</option>`
        )

    hearAbout.innerHTML = hearAboutOptions.join('')
}

outputCohorts()
outputHearAbout()
