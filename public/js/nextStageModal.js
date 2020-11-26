
function updateStage(url, applicantId, btnNextStage) {
    fetch(url).then(
        function(response) {
            response.json().then(
                function(data) {
                    console.log('line 7');
                    document.querySelector('#currentStageName' + applicantId).innerHTML = data['data']['newStageName'];
                    btnNextStage.dataset.stageid =  data['data']['stageId'];
                    //this is not yet working ie doenst hide Next Stage button if its hte last stage
                    if (data['data']['isLastStage']) {
                        btnNextStage.style.display = "none";
                        // console.log(btnNextStage.style.display);
                        // $('.btnNextStage').modal('hide');
                    }
                }
            )
        }
    )
}

$(document).ready(function(){
    $(".btnNextStage").click(function(){
        const stageId = this.dataset.stageid;
        const applicantId = this.dataset.applicantid;
        const thisButton  = this;
        var url = './api/getNextStageOptions/' + stageId;
        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        document.querySelector('#modal-main').innerHTML = '';
                        document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' + response.status + '</div>';
                        return;
                    }
                    response.json().then(function(data) {
                        console.log('line 36');
                        document.querySelector('#next-stage-options').innerHTML = '<option>Please select an Option</option>';
                        if (data['data']['nextStageOptions'].length == 0) {
                            console.log('line 44');
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
                                        const optionId =  document.querySelector('#next-stage-options').value;
                                        var url = './api/progressApplicantStage?stageId=' + data['data']['nextStageId'] + '&applicantId=' + applicantId + '&optionId=' + optionId;
                                        updateStage(url, applicantId, thisButton);
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
