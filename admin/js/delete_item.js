

function delete_item(id){

    $.ajax({
         url: "../php/scripts/delItem.php",
         type: "POST",
         data : {
            'id': id
         },
         success : function(data){
            if(data.length >= 1){
                alert('Данный товар был заказан пользователем!');
            }else{
                location.reload();
            }
         },
         error: function(){
             alert('Данный товар был заказан пользователем!');
         }
     })
 }

$(document).ready(function(){
    var items = document.querySelectorAll('#delete_item');
    items.forEach(el => {
      el.addEventListener('click', () => {
          delete_item(el.getAttribute('id_item'));
      })
    });
})