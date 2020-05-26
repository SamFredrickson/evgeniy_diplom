<?php

require '../Init.php';

$title = $_POST['title'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$size = $_POST['size'];
$pic = base64_encode(file_get_contents(addslashes($_FILES['pic']['tmp_name'])));

$db->insert_item($title, $size, $price, $desc, $pic);
