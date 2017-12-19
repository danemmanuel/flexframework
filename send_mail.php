<?php
require 'lib/phpmailer/PHPMailerAutoload.php';
require 'partes/config.php';

if (!empty($_POST)) {
	$nome = $_POST['nome'];
	$email = $_POST['email']; 
	$assunto = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];

	$corpo_mensagem_html = '
	<h3>Nome: <small>'.$nome.'</small></h3>
	<h3>Telefone: <small>'.$assunto.'</small></h3>
	<h3>E-mail: <small>'.$email.'</small></h3>
	<h3>Mensagem:</h3>
	<p>'.$mensagem.'</p>
	';

	$corpo_mensagem = '
	Nome: '.$nome.'
	Assunto: '.$assunto.'
	E-mail: '.$email.'
	Mensagem: '.$mensagem;
/*
	$data = array(
        'success' => false,
        'errors' => array()
        );

	$inputs = $_POST;

	foreach ($inputs as $key => $value) {

		switch($key) {
			case "nome":
			if (strlen($value) < 6) {
				$msg = "O campo nome não pode estar vazio e tem que ter mais de 6 caracteres.";
			}
			break;
			case "email":
			if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
				$msg = "Você deve fornecer um e-mail válido.";
			}
			break;
			case "assunto":
			if (strlen($value) < 6) {
				$msg = "O campo assunto não pode estar vazio.";
			}
			break;
			case "mensagem":
			if (strlen($value) < 30) {
				$msg = "Sua mensagem é muito curta.";
			}
			break;
			default:
			$msg = "Campos inválidos.";
			break;
		}
            //If there is an error, add it to the errors array with the field id
		if (!empty($msg)) {
			$data['errors'][] = array(
				'msg' => $msg,
				'campo' => $key
				);
		}
	}

        //Validation over, was it successful?
	if (empty($data['errors'])) {
		$data['success'] = true;*/

	/*

	}

	header("Content-Type: application/json; charset=UTF-8");
	echo json_encode((object)$data);*/

	if (!empty($nome) && !empty($assunto) && !empty($email) && !empty($mensagem) )  {

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = $smtp_server_mail;
		$mail->SMTPAuth = true;
		$mail->Username = $usuario_mail;
		$mail->Password = $senha_mail;
		$mail->Port = 587;
		//$mail->SMTPSecure  = 'ssl';
		$mail->CharSet = 'UTF-8';                

		$mail->From = $usuario_mail;
		$mail->FromName = $cliente;
		$mail->addAddress($destinatario);
		$mail->isHTML(true);

		$mail->Subject = 'Fale Conosco (Site)';
		$mail->Body    = $corpo_mensagem_html;
		$mail->AltBody = $corpo_mensagem;

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$response = array("success" => true); 
			echo json_encode($response);
		}


	} else {
		$response = array("error" => true); 
		echo json_encode($response);
	}
} else {
	$redirect = $baseURL . '/nao-encontrado';
	header("location:$redirect");
}
?>
