<?php

require "../Init.php";

$login = $_POST['login'];
$password = $_POST['password'];
$session->login($login, $password);
