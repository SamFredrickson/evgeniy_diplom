$(document).ready(function(){
    $('#add_item_btn').on('click', function(){
        var property = document.getElementById('picture').files[0];
        var form_data = new FormData();
        form_data.append('pic', property);
        form_data.append('title', $('#title').val());
        form_data.append('size', $('#size').val());
        form_data.append('price', $('#price').val());
        form_data.append('desc', $('#desc').val());

        $.ajax({
            url: "../php/scripts/insertItem.php",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                $('#addPage').modal('hide');
                location.reload();
            }
        })
    })
})