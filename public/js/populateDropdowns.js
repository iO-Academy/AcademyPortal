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
        let date = new Date(item.date);
        let dateOptions = {year: 'numeric', month: 'long'};
        cohortOptions += `value="${item.id}">${date.toLocaleDateString("en-US",dateOptions)}</option>`;
    });

    element.innerHTML += cohortOptions;
};

let outputHearAbout = async () => {
    const data = await handleFormOptions();
    const element = document.getElementById('hear-about');
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
