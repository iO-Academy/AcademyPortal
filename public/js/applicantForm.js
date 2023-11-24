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
        const chosenCourseElement = document.querySelector('#chosenCourseId');
        const futureCohortsWithChosenCourse = filterFutureDates(data.cohorts, chosenCourseElement.dataset.selected);
        outputCohorts(futureCohortsWithChosenCourse, chosenCourseElement);
    }

    checkPastAssessmentCheckbox(futureDates, data.assessments);
})()