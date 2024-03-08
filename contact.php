<?php
require_once('config_session.inc.php');
if(isset($_POST['send'])){
	
	
	$Nom = $_POST['nom'];
	
	$Email = $_POST['email'];
	$_SESSION['email'] = $Email;
	
	$Sujet = $_POST['sujet'];
	$Message = $_POST['msg'];
	
	require_once('mail.php');
	
	if(empty($Nom) | empty($Email) | empty($Sujet) | empty($Message) ){
		header('location: index.php?error');
		exit;
	}
	
	// Sanitize inputs to prevent email header injection
    $Nom = htmlspecialchars($Nom);
    $Sujet = htmlspecialchars($Sujet);
    $Message = htmlspecialchars($Message);
	$to = "khoulaleneadel84@gmail.com";
	

	
	$mail->setFrom($Email, $Nom);
	$mail->addAddress($to);
	$mail->Subject = $Sujet;
	$mail->Body = "From: ". $Nom . "\n Email: \n" . $Email ."Message: ". $Message;
	$mail->AltBody = $Message;
	
    // Send email
	if($mail->send('')){
		header('location: index.php?success');
		exit;
	}else{
		echo 'the email has not sent';
	}
	
	
	
}else {
	header('Location: index.php');
	exit;
}