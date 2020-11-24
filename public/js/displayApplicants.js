//display applicant cohort dropdown

(async () => {
  await outputCohorts();

  const params = new URLSearchParams(
    window.location.search
  );
  const cohort = params.get('cohortId') || 'all';
  const form = document.querySelector(
    '#sortFilterApplicants'
  );
  const select = document.querySelector('#cohorts');

  select.addEventListener('change', () => {
    // this feels like a hack but best solution I can come up with without rewritting the filter
    let sort = form.querySelector('.arrowBtn.active').value;
    let filter = `<input type="hidden" name="sort" value="${sort}">`;
    form.insertAdjacentHTML('beforeend', filter);
    form.submit();
  });

  if (cohort !== 'all') {
    document
      .querySelector(`[value='${cohort}']`)
      .setAttribute('selected', 'true');
    document
      .querySelector('.cohortSort')
      .classList.add('hidden');
  } else {
    document
      .querySelector("[value='all']")
      .setAttribute('selected', 'true');
    document
      .querySelector('.cohortSort')
      .classList.remove('hidden');
  }
})();

//display applicant stages dropdown

(async () => {
  await outputStages();

  const params = new URLSearchParams(
    window.location.search
  );
  const stage = params.get('stageId') || 'all';
  const form = document.querySelector(
    '#sortFilterApplicants'
  );
  const select = document.querySelector('#stages');

  select.addEventListener('change', () => {
    // this feels like a hack but best solution I can come up with without rewritting the filter
    let sort = form.querySelector('.arrowBtn.active').value;
    let filter = `<input type="hidden" name="sort" value="${sort}">`;
    form.insertAdjacentHTML('beforeend', filter);
    form.submit();
  });

  if (stage !== 'all') {
    document
      .querySelector(`[value='${stage}']`)
      .setAttribute('selected', 'true');
    document
      .querySelector('.stagesSort')
      .classList.add('hidden');
  } else {
    document
      .querySelector("[value='all']")
      .setAttribute('selected', 'true');
    document
      .querySelector('.stagesSort')
      .classList.remove('hidden');
  }
})();
