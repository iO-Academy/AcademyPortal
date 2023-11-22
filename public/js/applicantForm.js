(async () => {
    const data = await handleFormOptions();

    let futureDates = filterFutureDates(data.assessments);

    outputAssessmentDates(futureDates);
    outputCohortsAsCheckboxes(data.cohorts);

    if (document.getElementById('tasterDate')) {
        outputEvents(data.tasters, document.getElementById('tasterDate'));
    }
    outputHearAbout(data.hearAbout);
    outputGender(data.gender);
    outputBackgroundInfo(data.backgroundInfo);
    checkedCohortDates();

    if (document.querySelector('#chosenCourseId')) {
        const chosenCourseId = document.querySelector('#chosenCourseId').dataset.selected;
        const futureCohorts = filterFutureDates(data.cohorts);
        if(chosenCourseId) {
            futureCohorts.push(((data.cohorts.filter((cohort) => {
                return cohort.id == chosenCourseId;
            }))[0]));
        }
        console.log(futureCohorts);

        outputCohorts(futureCohorts, document.querySelector('#chosenCourseId'));
    }

    checkPastAssessmentCheckbox(futureDates, data.assessments);
})()