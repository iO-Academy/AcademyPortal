(async () => {
    await outputCohorts();

    const params = new URLSearchParams(window.location.search);
    const cohort = params.get("cohortId");
    const form = document.querySelector("form");
    const select = document.querySelector("select");

    select.addEventListener("change", () => {
        form.submit();
    });

    if (cohort !== 'all') {
        document.querySelector(`[value='${cohort}']`).setAttribute("selected", "true");
        document.querySelector('.cohortSort').classList.add('hidden');
    } else {
        document.querySelector("[value='all']").setAttribute("selected", "true");
        document.querySelector('.cohortSort').classList.remove('hidden');
    }
})();