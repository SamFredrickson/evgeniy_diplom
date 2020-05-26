
function add(id){
    $.ajax({
        url: "php/scripts/insertCart.php",
        type: "POST",
        data : {
           'id': id
        },
        success : function(data){
           alert('Успешно добавлено!');
           location.reload();
        }
    })
}

function add_to_cart(id){

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
                add(id);
           }
        }
    })
}

$(document).ready(function(){
    var items = document.querySelectorAll('#cart_plus');
    items.forEach(el => {
      el.addEventListener('click', () => {
          add_to_cart(el.getAttribute('num'));
      })
    });

    var cart = document.querySelectorAll('#cart_amount');
    cart.forEach(el => {
      el.addEventListener('blur', () => {
        add_to_cart_amount_update(el.getAttribute('item_id'), el.value);
    })
    });

    cart.forEach(el => {
        el.addEventListener('click', () => {
          $("#confirm_order").prop('disabled', true);
      })
      });
})
