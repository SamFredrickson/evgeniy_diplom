
function add_amount(id, amount){
    $.ajax({
        url: "php/scripts/insertCartAmount.php",
        type: "POST",
        data : {
           'id': id,
           'amount' : amount
        },
        success : function(data){
           alert('Успешно добавлено!');
           location.reload();
        }
    })
}

function add_to_cart_amount(id, amount){

   $.ajax({
        url: "php/scripts/getSession.php",
        type: "POST",
        data : {
           'status': 1
        },
        success : function(data){
           if(JSON.parse(data).length === 0){
                $('#loginUser').modal('show');
           }else{
                add_amount(id, amount);
           }
        }
    })
}

function add_amount_update(id, amount){
    $.ajax({
        url: "php/scripts/insertCartAmountUpdate.php",
        type: "POST",
        data : {
           'id': id,
           'amount' : amount
        },
        success : function(data){
           location.reload();
        }
    })
}

function add_to_cart_amount_update(id, amount){

    $.ajax({
         url: "php/scripts/getSession.php",
         type: "POST",
         data : {
            'status': 1
         },
         success : function(data){
            if(JSON.parse(data).length === 0){
                 $('#loginUser').modal('show');
            }else{
                 add_amount_update(id, amount);
            }
         }
     })
 }

$(document).ready(function(){
    $('#add_to_cart_btn').on('click', function(){
        add_to_cart_amount($('#add_to_cart_btn').attr('num'), $('#amount_item').val());
    });
})
