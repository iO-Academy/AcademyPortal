document.querySelectorAll('.collapse-header').forEach(section => {
    section.addEventListener('click', function(e) {
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