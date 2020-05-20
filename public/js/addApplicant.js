let getFormOptions = () => {
 
    return fetch('./api/applicationForm', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    }).then(response => response.json())
}

let handleFormOptions = async () => {
    let response = await getFormOptions()
    return response.data
}

let outputCohorts = async () => {
    const data = await handleFormOptions();
    const element = document.getElementById('cohorts');
    let cohortOptions = '';

    data.cohorts.forEach(cohort => {
        if (element.dataset.selected === cohort.id) {
            cohortOptions += `<option selected value="${cohort.id}">${cohort.date}</option>`
        } else {
            cohortOptions += `<option value="${cohort.id}">${cohort.date}</option>`
        }
    });

    element.innerHTML = cohortOptions
};

let outputHearAbout = async () => {
    let data = await handleFormOptions();
    let element= document.getElementById('hear-about');
    let hearAboutOptions = '';

    data.hearAbout.forEach(hearAbout => {
        if (element.dataset.selected === hearAbout.id) {
            hearAboutOptions += `<option selected value="${hearAbout.id}">${hearAbout.hearAbout}</option>`
        } else {
            hearAboutOptions += `<option value="${hearAbout.id}">${hearAbout.hearAbout}</option>`
        }
    });

    element.innerHTML = hearAboutOptions;
};

outputCohorts()
outputHearAbout()
