(async () => {
    const data = await handleFormOptions();
    outputCohortsAvailable(data.cohorts);
    outputHearAbout(data.hearAbout);
    if (document.querySelector('#chosenCourseId')) {
        outputCohorts(data.cohorts, document.querySelector('#chosenCourseId'));
    }
})()