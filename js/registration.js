function check_login_reg(){
    if($("#login").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_password_reg(){
    if($("#password").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_firstname(){
    if($("#firstname").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_lastname(){
    if($("#lastname").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_phone(){
    if($("#phone").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_lastname(){
    if($("#lastname").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_mail(){
    if($("#email").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function create_user(){
    if($('#login').hasClass('is-valid') && $('#password').hasClass('is-valid') &&
    $('#firstname').hasClass('is-valid') && $('#lastname').hasClass('is-valid') && $('#email').hasClass('is-valid') 
    && $('#phone').hasClass('is-valid')){

        $.ajax({
            url: "php/scripts/registerUser.php",
            type: "POST",
            data : {
               'login' : $('#login').val(),
               'password' : $('#password').val(),
               'firstname' : $("#firstname").val(),
               'lastname'  : $('#lastname').val(),
               'middlename' : $('#middlename').val().trim() === '' ? null : $('#middlename').val(),
               'phone'  : $('#phone').val(),
               'email' : $('#email').val()
            },
            success : function(data){
               $('#createUser').modal("hide");
            }
        })

    }
}

$(document).ready(function(){
    $('#login').on('blur', check_login_reg);
    $('#password').on('blur', check_password_reg);
    $('#firstname').on('blur', check_firstname);
    $('#lastname').on('blur', check_lastname);
    $('#phone').on('blur', check_phone);
    $('#email').on('blur', check_mail);

    $('#create_user').on('click', create_user);
})