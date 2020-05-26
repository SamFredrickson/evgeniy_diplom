<?php 

require '../Init.php';
require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


$items = $_POST['items'];
$sum = $_POST['sum'];
$login = $_SESSION['login'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mggtkdiplom@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '2v3mb8'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom("mggtkdiplom@mail.ru"); // от кого будет уходить письмо?
$mail->addAddress('mggtkdiplom@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Заказ";
$mail->Body    = 'Логин пользователя: ' . $login . "<br>" . 'Заказ: ' . $items . '<br>' . 'Итого: ' . $sum ."Р". '<br>';
$mail->AltBody = '';

if(empty($login) || empty($sum) || empty($items)){
    header("Location: error.html");
}else{
    if(!$mail->send()) {
        echo 0;
    } else {
        echo 1;
    }
}

?>