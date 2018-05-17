let getFormOptions = () => {
 
    return fetch('/api/applicationForm', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(json => json)
}

let handleFormOptions = async () => {
    let response = await getFormOptions()

    return response.data
}

let outputCohorts = async () => {
    let data = await handleFormOptions(),
        cohorts = document.getElementById('cohorts'),
        cohortOptions = data.cohorts.map(cohort => 
            `<option value="${cohort.date}">${cohort.date}</option>`    
        )

    cohorts.innerHTML = cohortOptions.join('')
}

let outputHearAbout = async () => {
    let data = await handleFormOptions(),
        hearAbout = document.getElementById('hear-about'),
        hearAboutOptions = data.hearAbout.map(hearAbout =>
            `<option value="${hearAbout.hearAbout}">${hearAbout.hearAbout}</option>`
        )

    hearAbout.innerHTML = hearAboutOptions.join('')
}

outputCohorts()
outputHearAbout()
