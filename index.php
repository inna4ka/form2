<?php 

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

error_reporting( E_ERROR );   //Отключение предупреждений и нотайсов (warning и notice) на сайте
// создание переменных из полей формы		
if (isset($_POST['name1']))			{$name1			= $_POST['name1'];		if ($name1 == '')	{unset($name1);}}
if (isset($_POST['email1']))		{$email1		= $_POST['email1'];		if ($email1 == '')	{unset($email1);}}
if (isset($_POST['text']))			{$text			= $_POST['text'];		if ($text == '')	{unset($text);}}
if (isset($_POST['sab']))			{$sab			= $_POST['sab'];		if ($sab == '')		{unset($sab);}}

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'innanochevkina'; // логин от вашей почты
$mail->Password = 'a45fd910001'; // пароль от почтового ящика
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';

$mail->CharSet = 'UTF-8';
$mail->From = 'innanochevkina@gmail.com'; // адрес почты, с которой идет отправка
$mail->FromName = 'Inna'; // имя отправителя
$mail->addAddress('innanochevkina@gmail.com', 'Inna2');
// $mail->addAddress('email2@email.com', 'Имя 2');
// $mail->addCC('email3@email.com');

$mail->isHTML(true);

$mail->Subject = 'Тема письма';
$mail->Body = 'Тема : $urok \r\nИмя : $name1 \r\n Email : $email1 \r\n Дополнительная информация : $text';
$mail->AltBody = 'Привет, мир! Это альтернативное письмо';
// $mail->addAttachment('img/Lighthouse.jpg', 'Картинка Маяк.jpg');
// $mail->SMTPDebug = 1;

if( $mail->send() ){
	echo 'Письмо отправлено';
}else{
	echo 'Письмо не может быть отправлено. ';
	echo 'Ошибка: ' . $mail->ErrorInfo;
}

?>