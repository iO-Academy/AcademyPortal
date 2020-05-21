(async () => {
    await outputCohorts();

    const params = new URLSearchParams(window.location.search);
    const cohort = params.get("cohortId");
    const form = document.querySelector("form");
    const select = document.querySelector("select");

    select.addEventListener("change", () => {
        form.submit();
    });

    if (cohort) {
        document.querySelector(`[value='${cohort}']`).setAttribute("selected", "true");
    } else {
        document.querySelector("[value='all']").setAttribute("selected", "true");
    }
})();