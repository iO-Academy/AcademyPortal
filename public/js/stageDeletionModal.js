$(document).ready(function(){
    $('.openMe').click(function(){
        $('#stageDeletionModal').modal('show');
    })
    $("#stageDeletionModalYes").on("click",function(){
        // add functionality to the Yes button
        $('#padlockLocked').attr('data-locked', '0');
        console.log('worked');
        $('#stageDeletionModal').modal('hide');
    })

    $("#stageDeletionModalCancel").click(function(){
        $('#stageDeletionModal').modal('hide');
    })
})

// custom data attr
// multiple event listeners - other group


