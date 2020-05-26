function check_name(){
    if($("#msg_name").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_mail(){
    if($("#msg_email").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_topic(){
    if($("#msg_topic").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_content(){
    if($("#msg_content").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function send_mail(){
    if($('#msg_name').hasClass('is-valid') && $('#msg_email').hasClass('is-valid') &&
    $('#msg_topic').hasClass('is-valid') && $('#msg_content').hasClass('is-valid') && $('#msg_topic').hasClass('is-valid')){

        $.ajax({
            url: "php/mailer/mail.php",
            type: "POST",
            data : {
               'name': $('#msg_name').val(),
               'email': $('#msg_email').val(),
               'topic': $('#msg_topic').val(),
               'content': $('#msg_content').val()
            },
            beforeSend: function(){
                $("#msg_send").prop('disabled', true);
            },
            success : function(data){
                $('#msgUser').modal('hide');
            }
        })
    }

}

function send_order(){
    $.ajax({
        url: "php/mailer/mail_cart.php",
        type: "POST",
        data : {
           'items': get_carts_data(),
           'sum'  : $('#total_sum').text().trim()
        },
        beforeSend: function(){
            $("#confirm_order").prop('disabled', true);
        },
        success : function(data){
           console.log(data);
           $("#confirm_order").prop('disabled', false);
        }
    })
}

function get_carts_data(){

    var titles = document.querySelectorAll('#title');
    var amounts = document.querySelectorAll("#cart_amount");
    var result = [];

    for(var i = 0; i < titles.length; i++) 
        result.push(titles[i].innerText + " (" + amounts[i].value + ")");

    return result.join(', ');
}

$(document).ready(function(){

    $('#msg_name').on('blur', check_name);
    $('#msg_email').on('blur', check_mail);
    $('#msg_topic').on('blur', check_topic);
    $('#msg_content').on('blur', check_content);
    $('#msg_send').on('click', send_mail);
    $('#confirm_order').on('click', send_order);

});