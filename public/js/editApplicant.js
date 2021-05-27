document.querySelectorAll('.collapse-header').forEach(section => {
    section.addEventListener('click', function(e) {
        this.querySelector('i').classList.toggle('glyphicon-chevron-down')
        this.querySelector('i').classList.toggle('glyphicon-chevron-up')
    })
})

const studentStages = document.querySelectorAll('section.student')
document.querySelector('#stageTitle').addEventListener('change', e => {
    const applicantId = document.getElementById('personalDetails').dataset.applicantid
    const stageId = document.querySelector('option:checked').dataset.stage
    if (e.target.querySelector('option:checked').dataset.student === "1") {
        studentStages.forEach(studentStage => {
            studentStage.classList.remove('hidden')
        })
        if(e.target.querySelector('option:checked').dataset.stage === "6") {
            $('#studentPasswordModal').modal('show');
            var url = './api/getNextStageOptions/' + stageId;
            fetch(url)
                .then(function(response) {
                if (response.status !== 200) {
                    document.querySelector('#modal-main').innerHTML = '';
                    document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' + response.status + '</div>';
                    return;
                }
            response.json().then(function(data) {
                fetch(`/api/applicantPassword/${applicantId}`, {
                    method: 'POST'
                }).then(data => data.json())
                    .then(passwordResponse => {
                        document.getElementById('randomPassword').value = passwordResponse.password
                    })
                var url = './api/progressApplicantStage?stageId=' + data['data']['nextStageId'] + '&applicantId=' + applicantId;
                document.querySelector('.btnOk').addEventListener('click', () => {
                    $passwordChecked = document.getElementById('copied-password-check');
                    if ($passwordChecked.checked) {
                        $('#studentPasswordModal').modal('hide');
                    }
                })
            })
        })
    } else {
        studentStages.forEach(studentStage => {
            studentStage.classList.add('hidden')
        })
    }
}})