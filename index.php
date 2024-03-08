<?php
require_once('config_session.inc.php');
	// Vérification si un message est stocké dans la session
if (isset($_GET['error'])) {
    // Affichage de l'alerte JavaScript avec le message de la session
    echo '<script>alert("Veillez remplir tout les champs !!");</script>';
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Contact Us</title>
</head>
<body>

	<p class="par"> Contactez Adel </p>
	
	<div class = "box">
	<img style = "position : relative; top: 0px; left: 200px" src="conversation1.png" alt="conversation image">
		<?php 
			
			if(isset($_GET['success'])){
				$Msg = "Votre message a été bien envoyer :)";
				echo '<div class = "">'. $Msg .'</div>';
			}
		?>
			
		<form action = "contact.php" method = "POST">
		
			<div class="input-group SlideInLeft">
				<input type = "text" name = "nom" placeholder = "Nom Complet"></input> 
			</div>
			<div class="input-group SlideInLeft">
				<input type = "email" name = "email" placeholder = "Email"></input>
			</div>
			<div class="input-group SlideInLeft">
				<input type = "text" name = "sujet" placeholder = "Sujet"></input>
			</div>
			<div class="input-group SlideInLeft massage">
				<input type = "textarea" name = "msg" placeholder = "Ecrit votre message ici ..."></input>
			</div>
			<br>
		<button class = "btn" name = "send">Envoyer</button>
		
	</div>
	
	</form>
</body>
</html>