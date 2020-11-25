
$(document).ready(function(){
    $(".btnNextStage").click(function(){
        const stageId = this.dataset.stageid;
        var url = './api/getNextStageOptions/' + stageId;
        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        document.querySelector('#modal-main').innerHTML = '';
                        document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
                            response.status + '</div>';
                        return;
                    }
                    // Examine the text in the response
                    response.json().then(function(data) {
                        document.querySelector('#next-stage-options').innerHTML = '<option>Please select an Option</option>';
                        //if there are no option for next stage, call another controller to move to next stage
                        if (data['data']['nextStageOptions'].length === 0) {
                            //call other controller
                        }
                        //else show options  for the next stage in a modal
                        else {
                            let optionValues = "";
                            data['data']['nextStageOptions'].forEach(item => {
                                optionValues += `<option value="${item.id}">${item.option}</option>`;
                            })
                            document.querySelector('#next-stage-options').innerHTML += optionValues;
                            $('#nextStageModal').modal('show');
                        }
                    })
                }
            )
    })
})
