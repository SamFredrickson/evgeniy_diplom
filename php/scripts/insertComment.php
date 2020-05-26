<?php

require "../Init.php";

$comment = trim(htmlentities($_POST['comment']));
$id_item = $_POST['id_item'];
$date = (new DateTime())->format('Y-m-d');

$db->insert_comment($_SESSION['id'], $id_item, $comment, $date);