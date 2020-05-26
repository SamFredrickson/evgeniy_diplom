

function check_comment(){
    if($("#item_comment").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function send(){
   if($("#item_comment").hasClass("is-valid")){
    $.ajax({
        url: "php/scripts/insertComment.php",
        type: "POST",
        data : {
           'comment': $('#item_comment').val(),
           'id_item' : $('#send_comment').attr('id_item')
        },
        beforeSend: function(){
            $("#send_comment").prop('disabled', true)
        },
        success : function(data){
           console.log(data);
           $("#send_comment").prop('disabled', false)
           location.reload();
        }
    })
   }
}

$(document).ready(function(){
    $('#item_comment').on('blur', check_comment)
    $('#send_comment').on('click', send);
})