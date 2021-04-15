const team1 = document.querySelector('#team1');
const team2 = document.querySelector('#team2');
const unsorted = document.querySelector('#unsorted');
const saveBtn = document.querySelector('#save-teams');
const team1Name = document.querySelector('#team1name')
const team2Name = document.querySelector('#team2name')
const saveResult = document.querySelector('#save-result')
const teamSize = 2;

function onAdd(e) {
    const applicantCount = e.to.querySelectorAll('.applicant').length;
    if (applicantCount > teamSize) {
        e.from.appendChild(e.item)
    }

    if (applicantCount === teamSize) {
        e.to.classList.add('full')
    }
}

function onRemove(e) {
    e.from.classList.remove('full')
}

function resetTeams() {
    unsorted.innerHTML = ''
    team1.innerHTML = ''
    team1.classList.remove('full')
    team2.innerHTML = ''
    team2.classList.remove('full')
}

function sortTeams(applicants) {
    const teams = {
        team1: [],
        team2: [],
        unsorted: []
    }

    let sortedApplicants = applicants.reduce(
        (acc, applicant) => {
            let existingArray = acc[applicant.team] ? acc[applicant.team] : [];
            existingArray.push(applicant)
            acc[applicant.team] = existingArray
            return acc
        }, {}
    )

    teams.unsorted = sortedApplicants[null]
    delete sortedApplicants[null]
    sortedApplicants = Object.values(sortedApplicants) // convert to array with index keys
    teams.team1 = sortedApplicants[0] || []
    teams.team2 = sortedApplicants[1] || []

    return teams
}



new Sortable(team1, {
    group: 'teams',
    animation: 150,
    onAdd: onAdd,
    onRemove: onRemove
});

new Sortable(team2, {
    group: 'teams',
    animation: 150,
    onAdd: onAdd,
    onRemove: onRemove
});

new Sortable(unsorted, {
    group: 'teams',
    animation: 150
});


(async () => {
    const data = await handleFormOptions();
    outputCohorts(data.cohorts);
    document.querySelector("#cohorts").addEventListener('change', async e => {
        saveResult.classList.add('hidden')

        const cohortId = e.target.value;
        if (!isNaN(cohortId)) {
            let applicants = await fetch('./api/getStudents?cohortId=' + cohortId);
            applicants = await applicants.json();

            resetTeams()

            if (applicants.data.length === 0) {
                unsorted.innerHTML = '<h5 class="text-danger">No students for this cohort yet</h5>'
            } else {

                const teams = sortTeams(applicants.data)

                teams.team1.forEach(applicant => {
                    team1.innerHTML += `<div data-id="${applicant.id}" class="applicant">
                    <h5>${applicant.name}</h5>
                </div>`
                })
                team1Name.value = teams.team1?.[0]?.trainer ?? ''
                team1.dataset.id = teams.team1?.[0]?.team ?? ''

                teams.team2.forEach(applicant => {
                    team2.innerHTML += `<div data-id="${applicant.id}" class="applicant">
                    <h5>${applicant.name}</h5>
                </div>`
                })
                team2Name.value = teams.team2?.[0]?.trainer ?? ''
                team2.dataset.id = teams.team2?.[0]?.team ?? ''

                teams.unsorted.forEach(applicant => {
                    unsorted.innerHTML += `<div data-id="${applicant.id}" class="applicant">
                    <h5>${applicant.name}</h5>
                </div>`
                })
            }

        } else {
            unsorted.innerHTML = '<h5>Select a cohort to begin</h5>'
        }
    });

    saveBtn.addEventListener('click', async (e) => {
        e.target.disabled = true;
        saveResult.classList.add('hidden')

        const data = {
            team1: {
                trainer: team1Name.value,
                teamId: team1.dataset.id,
                students: Array.from(team1.querySelectorAll('.applicant')).map(applicant => {
                    return parseInt(applicant.dataset.id)
                })
            },
            team2: {
                trainer: team2Name.value,
                teamId: team2.dataset.id,
                students: Array.from(team2.querySelectorAll('.applicant')).map(applicant => {
                    return parseInt(applicant.dataset.id)
                })
            }
        }

        let result = await fetch('/api/updateTeams', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/JSON'
            }
        })

        result = await result.json()

        saveResult.textContent = result.message;
        saveResult.classList.remove('hidden')
        if (result.success) {
            team1.dataset.id = result.data.team1
            team2.dataset.id = result.data.team2
            saveResult.classList.add('alert-success')
            saveResult.classList.remove('alert-danger')
        } else {
            saveResult.classList.add('alert-danger')
            saveResult.classList.remove('alert-success')
        }
        e.target.disabled = false;
    })

})();


