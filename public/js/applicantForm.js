(async () => {
    const data = await handleFormOptions();
    outputCohorts(data.cohorts);
    outputHearAbout(data.hearAbout);
    if (document.querySelector('#chosenCourseId')) {
        outputCohorts(data.cohorts, document.querySelector('#chosenCourseId'));
    }
})()