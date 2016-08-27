jQuery(document).ready(function() {

    jQuery('button.close-modal').click(closeModal);
});

function openSuccessModal(){
    console.log('1');
    jQuery('div.modal-container').css('display','block');
    console.log('2');
}

function closeModal(){

    jQuery('div.modal-container').css('display','none');
}
