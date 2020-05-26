<?php

require "../Init.php";

$id = $_POST['id'];

$db->insert_cart($id);
