(async () => {
    const data = await handleFormOptions();
    outputAssessmentDates(data.assessments);
    outputCohorts(data.cohorts);
    if (document.getElementById('tasterDate')) {
        outputEvents(data.tasters, document.getElementById('tasterDate'));
    }
    outputHearAbout(data.hearAbout);
    outputBackgroundInfo(data.backgroundInfo);
    if (document.querySelector('#chosenCourseId')) {
        outputCohorts(data.cohorts, document.querySelector('#chosenCourseId'));
    }
})()