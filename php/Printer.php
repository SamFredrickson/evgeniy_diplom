<?php

class Printer{
    public function show_item($id, $image, $size, $title, $price){
print <<<_HTML_
<div class="col-lg-4 col-md-6 mb-4">
<div class="card p-2">
<div class="view overlay">
<img class="card-img-top" src="data:image;base64,$image" alt="Bear">
<a href="#" id="mask_img" num="$id">
<div class="mask rgba-white-slight"></div>
</a>
</div>
<div class="card-body text-center">
<a href="#" class="grey-text">
<h5>Длина: $size СМ</h5>
</a>
<h5>
<strong>
<a href="#" class="dark-grey-text">$title</a>
</strong>
</h5>
<h4 class="font-weight-bold blue-text">
<strong>$price Р</strong>
</h4>           
<h4 class="text-right">
<a class="grey-text" id="cart_plus" num="$id">
<i class="fas fa-cart-plus"></i>
</a>
</h4>
</div>
</div>
</div>
_HTML_;
    }

    public function show_cart_item($id, $title, $desc, $image, $price, $amount){
print <<<_HTML_
<div class="card mb-3" style="width: 100%;" id="card_container">
<div class="row no-gutters">
<div class="col-md-4 text-center">
<img src="data:image;base64,$image"  class="card-img p-3" style="width: 200px;" alt="...">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title text-right red-text" style="cursor: pointer;"><i id="$id" class="far fa-trash-alt"></i></h5>
<h5 class="card-title" id="title">$title</h5>
<h5 class="card-title">Цена: $price Р</h5>
<p class="card-text">$desc</p>
<p class="card-text">
<input type="number" value="$amount" id="cart_amount" item_id="$id" min="1" arial-label="Search" style="width:100px;" class="form-control">
</p>
</div>
</div>
</div>
</div>
_HTML_;
    }

    public function show_comment($id, $login, $comment){
print <<<_HTML_
<div class="text-left">
<h3>$login пишет:</h3>
<p class="lead">$comment</p>
</div>
_HTML_;
    }

    public function show_admin_item($id, $title, $price, $size){
print <<<_HTML_
<tr>
<td>$title</td>
<td>$price</td>
<td>$size СМ</td>
<td><a class="btn btn-danger" id="delete_item" id_item="$id">Удалить</a></td>
</tr>
_HTML_;
    }
}