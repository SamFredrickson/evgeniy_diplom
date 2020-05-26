<?php

require '../Init.php';

$login = $_POST['login'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$role = 'Пользователь';
$regDate = (new DateTime())->format('Y-m-d');
$db->create_user($login, $password, $firstname, $lastname, $middlename, $phone, $email, $role, $regDate);
