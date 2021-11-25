$(document).ready(function(){
    // $("#padlockLocked").click(function(){
    //     $('#stageDeletionModal').modal('show');
    // })
    $("#stageDeletionModalYes").click(function(){
        // add functionality to the Yes button
        $('#stageDeletionModal').modal('hide');
    })

    $("#stageDeletionModalCancel").click(function(){
        $('#stageDeletionModal').modal('hide');
    })
})

