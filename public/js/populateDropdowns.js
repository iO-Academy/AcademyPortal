let getFormOptions = () => {
 
    return fetch('./api/applicationForm', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    }).then(response => response.json())
};

let handleFormOptions = async () => {
    let response = await getFormOptions();
    return response.data
};

let outputCohorts = async () => {
    const data = await handleFormOptions();
    const element = document.getElementById('cohorts');
    let cohortOptions = '';

    data.cohorts.forEach(item => {
        cohortOptions += "<option ";
        if (element.dataset.selected === item.id) {
            cohortOptions += "selected ";
        }
        cohortOptions += `value="${item.id}">${item.date}</option>`;
    });

    element.innerHTML = cohortOptions;
};

let outputHearAbout = async () => {
    let data = await handleFormOptions();
    let element = document.getElementById('hear-about');
    let hearAboutOptions = '';

    data.hearAbout.forEach(item => {
        hearAboutOptions += "<option ";
        if (element.dataset.selected === item.id) {
            hearAboutOptions += "selected ";
        }
        hearAboutOptions += `value="${item.id}">${item.hearAbout}</option>`;
    });

    element.innerHTML = hearAboutOptions;
};


