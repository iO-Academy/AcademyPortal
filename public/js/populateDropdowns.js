const pastAssessmentCheckbox = document.getElementById('pastAssessmentDays')

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

let getGenderOptions = () => {
  return fetch('./api/getGender', {
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

let handleGenderOptions = async () => {
  let response = await getGenderOptions();
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
    if (item.student === '1') {
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

let outputCohortsAsCheckboxes = (cohorts, el = null) => {
  const element = el || document.querySelector('#cohorts');
  let cohortOptions = '';
  cohorts.forEach(item => {
    cohortOptions += `<label class="cohort_checkbox"><input name="cohort" class="submitApplicant" type="checkbox" value="${item.id}"> `;
    let date = new Date(item.date);
    let dateOptions = {year: 'numeric', month: 'long'};
    cohortOptions += `${date.toLocaleDateString(
        'en-GB',
        dateOptions
    )}</label>`;
  });
  element.innerHTML += cohortOptions;
};

const checkedCohortDates = () => {
  let cohortIds = document.querySelector('#cohorts').dataset.dates || '';
  cohortIds = cohortIds.split(',')
  document.querySelectorAll('#cohorts input').forEach(input => {
    if (cohortIds.includes(input.value)) {
      input.checked = true;
    }
  })
}

  let outputAssessmentDates = (dates, el = null) => {
    const element = el || document.querySelector('#assessmentDay');
    let assessmentOptions = '';

    if (element) {
      dates.forEach(item => {
        assessmentOptions += '<option ';
        if (element.dataset.selected === item.date) {
          assessmentOptions += 'selected ';
        }
        let date = new Date(item.date);
        let dateOptions = {year: 'numeric', month: 'long', day: 'numeric'};
        assessmentOptions += `value="${
            item.id
        }">${date.toLocaleDateString(
            'en-GB',
            dateOptions
        )}</option>`;
      });

      element.innerHTML += assessmentOptions;
    }

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

let outputGender = (options) => {
  const element = document.getElementById('gender');
  let genderOptions = '';

  options.forEach(item => {
    genderOptions += '<option ';
    if (element.dataset.selected === item.id) {
      genderOptions += 'selected ';
    }
    genderOptions += `value="${item.id}">${item.gender}</option>`;
  });

  element.innerHTML = genderOptions;
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



let filterFutureDates = (events) => {
  let currentDate = new Date();
  return events.filter((event) => {
    eventDateObject = new Date(event.date)
      return eventDateObject > currentDate;
    });
}


