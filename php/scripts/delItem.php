<?php

require "../Init.php";

$item_id = $_POST['id'];

$db->delete_from_item($item_id);