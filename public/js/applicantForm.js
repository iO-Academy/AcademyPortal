(async () => {
    const data = await handleFormOptions();
    outputCohorts(data.cohorts);
    outputHearAbout(data.hearAbout);
})()