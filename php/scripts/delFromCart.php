<?php

require "../Init.php";

$item_id = $_POST['id'];

$db->delete_from_cart($item_id);