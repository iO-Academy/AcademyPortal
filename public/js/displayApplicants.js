
(async ()=> {
  sessionStorage['name'] = '';
  const nameInput = document.querySelector('#searchName');
  const search =  document.querySelector('#navSubmitButton');
  const params = new URLSearchParams(
      window.location.search
  );
  sessionStorage['name'] = params.get('name') || sessionStorage['name'] || "";

  nameInput.addEventListener('change', (e)=>{
    nameInput.value = e.target.value;
  })

  search.addEventListener('click', ()=>{
    sessionStorage['name'] = nameInput.value;
  })

  nameInput.addEventListener('keydown', (e)=>{
    if (e.key === 'Enter') {
      e.preventDefault();
      search.click();
    }
  })

  document.querySelector('#navClearButton').addEventListener('click', ()=>{
    sessionStorage['name'] = '';
    nameInput.value = sessionStorage['name'];
  })

  nameInput.value = sessionStorage['name'];

})();

(async () => {
  const data = await handleFormOptions();
  outputCohorts(data.cohorts);

  const params = new URLSearchParams(
    window.location.search
  );
  sessionStorage['cohortID'] = params.get('cohortId') || sessionStorage['cohortID'] || 'all';
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

  if (sessionStorage['cohortID'] !== 'all') {
    document
      .querySelector(`[value='${sessionStorage['cohortID']}`)
      .setAttribute('selected', 'true');
  } else {
    document
      .querySelector("[value='all']")
      .setAttribute('selected', 'true');
  }
})();

//display applicant stages dropdown

(async () => {
  await outputStages();

  const params = new URLSearchParams(
    window.location.search
  );
  sessionStorage['stageId']= params.get('stageId') || sessionStorage['stageId'] || 'all';
  const form = document.querySelector(
    '#sortFilterApplicants'
  );
  const select = document.querySelector('#stages');

  select.addEventListener('change', () => {
    // this feels like a hack but best solution I can come up with without rewriting the filter
    let sort = form.querySelector('.arrowBtn.active').value;
    let filter = `<input type="hidden" name="sort" value="${sort}">`;
    form.insertAdjacentHTML('beforeend', filter);
    form.submit();
  });

  if (sessionStorage['stageId'] !== 'all') {
    document
      .querySelector(`[value='${sessionStorage['stageId']}']`)
      .setAttribute('selected', 'true');
  } else {
    document
      .querySelector("[value='all']")
      .setAttribute('selected', 'true');
  }
})();
