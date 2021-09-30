function updateStage(url, applicantId, btnNextStage) {
    fetch(url).then(
        function(response) {
            response.json().then(
                function(data) {
                     function getCorrectOption() {
                         if (data['data']['option'][0] == undefined) {
                             return " "
                         } else {
                             return " - " + data['data']['option'][0]['option']
                         }
                     }

                    let option = getCorrectOption()

                        document.querySelector('#currentStageName' + applicantId).innerHTML = data['data']['newStageName'] + option;
                   console.log(data);
                    btnNextStage.dataset.stageid =  data['data']['stageId'];
                    if (data['data']['isLastStage'] === data['data']['stageId']) {
                        $(btnNextStage).remove();
                    }
                }
            )
        }
    )
}

$(document).ready( function(){
    $(".btnNextStage").click(function(){
        const stageId = this.dataset.stageid;
        const applicantId = this.dataset.applicantid;
        const thisButton  = this;
        var url = './api/getNextStageOptions/' + stageId + '?applicantId=' + applicantId;

        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        document.querySelector('#modal-main').innerHTML = '';
                        document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' + response.status + '</div>';
                        return;
                    }
                    response.json().then(function(data) {
                        document.querySelector('#next-stage-options').innerHTML = '<option>Please select an Option</option>';
                        const alert = document.querySelector('#passwordMessage')
                        if (data['data']['password']) {
                            $('#applicantPassword').modal('show');
                            const applicantLink = document.querySelector('#applicant_password_link')
                            applicantLink.querySelector('span').textContent = applicantId;
                            applicantLink.href = applicantLink.dataset.href + applicantId;
                            document.querySelector('#copyPassword').addEventListener('click', () => {
                                document.querySelector('#randomPassword').select();
                                document.execCommand("copy");
                                alert.classList.remove('alert-danger')
                                alert.classList.add('alert-success')
                                alert.innerHTML = 'Password successfully copied!'
                            })
                            document.querySelector('#randomPassword').value = data['data']['password']
                            document.querySelector('.btnPasswordGenerate').addEventListener('click', function()
                            {
                                if (document.querySelector('#password_checkbox').checked) {
                                    $('#applicantPassword').modal('hide');
                                    alert.classList.remove('alert-danger', 'alert-success')
                                    alert.innerHTML = ''
                                    document.querySelector('#password_checkbox').checked = false
                                } else {
                                    alert.classList.add('alert-danger')
                                    alert.innerHTML = '↑↑↑ Please confirm that you saved the password ↑↑↑ !'
                                }
                            })
                        }
                        if (data['data']['nextStageOptions'].length === 0) {
                            var url = './api/progressApplicantStage?stageId=' + data['data']['nextStageId'] + '&applicantId=' + applicantId;
                            updateStage(url, applicantId, thisButton);
                        }
                        else {
                            let optionValues = "";
                            data['data']['nextStageOptions'].forEach(item => {
                                optionValues += `<option value="${item.id}">${item.option}</option>`;
                            })

                            document.querySelector('#next-stage-options').innerHTML += optionValues;
                            $('#nextStageModal').modal('show');


                            document.querySelector('.btnNextStageOptions').addEventListener('click',
                                function() {
                                        let optionId =  document.querySelector('#next-stage-options').value;


                                        var url = './api/progressApplicantStage?stageId=' + data['data']['nextStageId'] + '&applicantId=' + applicantId + '&optionId=' + optionId;
                                        updateStage(url, applicantId, thisButton)
                                        $('#nextStageModal').modal('hide');
                                }
                            )
                        }
                    })
                }
            )
        }
    )
})
