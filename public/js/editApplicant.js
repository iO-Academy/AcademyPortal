document.querySelectorAll('.collapse-header').forEach(section => {
    section.addEventListener('click', function (e) {
        this.querySelector('i').classList.toggle('glyphicon-chevron-down')
        this.querySelector('i').classList.toggle('glyphicon-chevron-up')
    })
})

const studentStages = document.querySelectorAll('section.student')
document.querySelector('#stageTitle').addEventListener('change', e => {
    if (e.target.querySelector('option:checked').dataset.student === "1") {
        studentStages.forEach(studentStage => {
            studentStage.classList.remove('hidden')
        })
    } else {
        studentStages.forEach(studentStage => {
            studentStage.classList.add('hidden')
        })
    }
})

document.querySelector('.getAptitudeScoreButton').addEventListener('click', aptitudeScoreButtonClick)

function showAlertForApptitudeButton(alertSelector)
{
    document.querySelector(alertSelector).classList.remove('hidden')
    setTimeout(() => {
        document.querySelector(alertSelector).classList.add('hidden')
    }, 3000)
}
function aptitudeScoreButtonClick(e)
{
    e.preventDefault()
    fetch(`/api/getAptitudeScore?email=${e.target.dataset.email}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('#aptitude').value = data.data.score;
            } else {
                document.querySelector('#aptitudeScoreError').textContent = data.message;
                showAlertForApptitudeButton('#aptitudeScoreError')
            }
        })
        .catch(error => {
                document.querySelector('#aptitudeScoreError').textContent = "Unexpected Error";
                showAlertforApptitudeButton('#aptitudeScoreError')
        });
}
