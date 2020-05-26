function check_login(){
    if($("#login_in").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function check_password(){
    if($("#password_in").val().trim() == ''){
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
    } 
    else {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
     }
}

function onload_session(){
    $.ajax({
        url: "php/scripts/getSession.php",
        type: "POST",
        data : {
           'status': 1
        },
        success : function(data){
           if(JSON.parse(data).length !== 0){
                $('#login_navbar').text(JSON.parse(data).login);
           }
        }
    })
}

function login(){
    if($('#password_in').hasClass('is-valid') && $('#login_in').hasClass('is-valid')){

        $.ajax({
            url: "php/scripts/getLogin.php",
            type: "POST",
            data : {
               'login': $('#login_in').val(),
               'password': $('#password_in').val()
            },
            beforeSend: function(){
                $("#login_user").prop('disabled', true);
            },
            success : function(data){
                if(data === '0')
                    {
                        $('#wrong_pass_login').show();
                    }
                else
                    {
                         $('#login_navbar').text($('#login_in').val());
                         $('#loginUser').modal('hide');
                         $('#send_comment').prop('disabled', false);
                     }
            }
        })

    }
}

$(document).ready(function(){
    onload_session();
    $('#login_in').on('blur', check_login);
    $('#password_in').on('blur', check_login);
    $('#login_user').on('click', login);
})