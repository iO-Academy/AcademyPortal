(async () => {
    const data = await handleFormOptions();
    outputCohortsAsCheckboxes(data.cohorts);

    if (document.getElementById('tasterDate')) {
        outputEvents(data.tasters, document.getElementById('tasterDate'));
    }
    outputHearAbout(data.hearAbout);
    outputBackgroundInfo(data.backgroundInfo);
    checkedCohortDates();

    if (document.querySelector('#chosenCourseId')) {
        outputCohorts(data.cohorts, document.querySelector('#chosenCourseId'));
    }
})()
