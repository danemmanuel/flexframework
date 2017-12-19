<?php

require 'lib/phpmailer/PHPMailerAutoload.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$msg = utf8_decode($msg);
$body = "";


$mail = new PHPMailer;

$body .= "<h2>Form de Contato</h2>";
$body .= "Nome: $nome <br>";
$body .= "E-mail: $email <br>";
$body .= "Mensagem:<br>";
$body .= $msg;
$body .= "<br>";
$body .= "----------------------------";
$body .= "<br>";
$body .= "Enviado em <strong>".date("h:m:i d/m/Y")." por ".$_SERVER['REMOTE_ADDR']."</strong>"; //mostra a data e o IP
$body .= "<br>";
$body .= "----------------------------";


$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.99moteis.com.br';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contato@99moteis.com.br';                // SMTP username
$mail->Password = 'mudarsenha123@';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted


$mail->From = 'contato@99moteis.com.br';
$mail->FromName = $nome;
$mail->AddAddress('contato@99moteis.com.br', '99 Motéis');  // Add a recipient


$mail->IsHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Form de Contato';
$mail->Body    = $body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'A mensagem não foi enviada!';
   echo 'Erro: ' . $mail->ErrorInfo;
   exit;
}

?>