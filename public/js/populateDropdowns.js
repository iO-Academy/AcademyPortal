//stages dropdown menu

let getStageOptions = () => {
  return fetch('./api/getStages', {
    credentials: 'same-origin',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
  }).then(response => response.json());
};

let handleStageOptions = async () => {
  let response = await getStageOptions();
  return response.data;
};

let outputStages = async () => {
  const data = await handleStageOptions();
  const element = document.getElementById('stages');
  let stageOptions = '';
  data.stages.forEach(item => {
    stageOptions += '<option ';

    if (element.dataset.selected === item.id) {
      stageOptions += 'selected ';
    }
    stageOptions += `value="${item.id}">${item.title}`;
    if (item.student) {
      stageOptions += ` (Student)`;
    }

    stageOptions += `</option>`;
  });

  element.innerHTML += stageOptions;
};

//cohort dropdown menu

let getFormOptions = () => {
  return fetch('./api/applicationForm', {
    credentials: 'same-origin',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
  }).then(response => response.json());
};

let handleFormOptions = async () => {
  let response = await getFormOptions();
  return response.data;
};

let outputCohorts = async () => {
  const data = await handleFormOptions();
  const element = document.getElementById('cohorts');
  let cohortOptions = '';

  data.cohorts.forEach(item => {
    cohortOptions += '<option ';

    let date = new Date(item.start_date);
    let selectedDate = new Date(element.dataset.selected)
    let dateOptions = {year: 'numeric', month: 'long'};

    // making item.date and selected date the same format so they are comparable
    let shortDate = date.toLocaleDateString(
        'en-GB',
        dateOptions
    )

    let shortSelectedDate = selectedDate.toLocaleDateString(
        'en-GB',
        dateOptions
    )

    if (shortSelectedDate === shortDate) {
      cohortOptions += 'selected ';
    }
    cohortOptions += `value="${
      item.id
    }">${date.toLocaleDateString(
      'en-GB',
      dateOptions
    )}</option>`;
  });

  element.innerHTML += cohortOptions;
};

let outputHearAbout = async () => {
  const data = await handleFormOptions();
  const element = document.getElementById('hear-about');
  let hearAboutOptions = '';

  data.hearAbout.forEach(item => {
    hearAboutOptions += '<option ';
    if (element.dataset.selected === item.id) {
      hearAboutOptions += 'selected ';
    }
    hearAboutOptions += `value="${item.id}">${item.hearAbout}</option>`;
  });

  element.innerHTML = hearAboutOptions;
};
