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

let outputCohorts = (cohorts, el = null) => {
  const element = el || document.getElementById('cohorts');
  let cohortOptions = '';

  cohorts.forEach(item => {
    cohortOptions += '<option ';
    if (element.dataset.selected === item.id) {
      cohortOptions += 'selected ';
    }
    let date = new Date(item.date);
    let dateOptions = {year: 'numeric', month: 'long'};
    cohortOptions += `value="${
      item.id
    }">${date.toLocaleDateString(
      'en-GB',
      dateOptions
    )}</option>`;
  });

  element.innerHTML += cohortOptions;
};

let outputEvents = (events, element) => {
  let eventOptions = '';

  events.forEach(item => {
    if (element.innerHTML.indexOf('value="' + item.id) === -1) {
      eventOptions += '<option ';
      let date = new Date(item.date);
      let dateOptions = {year: 'numeric', month: 'long', day: 'numeric'};
      eventOptions += `value="${
          item.id
      }">${date.toLocaleDateString(
          'en-GB',
          dateOptions
      )}</option>`;
    }
  });

  element.innerHTML += eventOptions;
};

let outputHearAbout = (options) => {
  const element = document.getElementById('hear-about');
  let hearAboutOptions = '';

  options.forEach(item => {
    hearAboutOptions += '<option ';
    if (element.dataset.selected === item.id) {
      hearAboutOptions += 'selected ';
    }
    hearAboutOptions += `value="${item.id}">${item.hearAbout}</option>`;
  });

  element.innerHTML = hearAboutOptions;
};

let outputBackgroundInfo = (options) => {
  const element = document.getElementById('backgroundInfo');
  let backgroundInfoOptions = '';

  options.forEach(item => {
    backgroundInfoOptions += '<option ';
    if (element.dataset.selected === item.id) {
      backgroundInfoOptions += 'selected ';
    }
    backgroundInfoOptions += `value="${item.id}">${item.backgroundInfo}</option>`;
  });

  element.innerHTML = backgroundInfoOptions;
};
