function delete_item(id){
    $.ajax({
        url: "php/scripts/delFromCart.php",
        type: "POST",
        data : {
           'id': id
        },
        success : function(data){
           location.reload();
        }
    })
}

$(document).ready(function(){
    var del = document.querySelectorAll('.fa-trash-alt');
    del.forEach(el => {
      el.addEventListener('click', () => {
        delete_item(el.id);
    })
    });
})