<?php

require "../Init.php";

$id = $_POST['id'];
$amount = $_POST['amount'];

$db->insert_cart_amount_update($id, $amount);
