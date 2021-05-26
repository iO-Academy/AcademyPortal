(async () => {
    const data = await handleFormOptions();
    outputCohorts(data.cohorts);
    outputHearAbout(data.hearAbout);
    outputBackgroundInfo(data.backgroundInfo);
    if (document.querySelector('#chosenCourseId')) {
        outputCohorts(data.cohorts, document.querySelector('#chosenCourseId'));
    }
})()