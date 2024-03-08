<?php



ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
	'lifetime' => 1800,
	'domain' => 'localhost',
	'path' => '/',
	'secure' => true ,
	'httponly' => true
]);

session_start();

if(!isset($_SESSION['last_regeneration'])){
	regenerate_session_id();
} else {
	$intervale = 60 * 30;
		if(time() - $_SESSION['last_regeneration'] <= $intervale){
			regenerate_session_id();
		}
	
}

function regenerate_session_id(){
	session_regenerate_id();
	$_SESSION['last_regeneration'] = time();
}

// Générer un jeton CSRF s'il n'existe pas déjà
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génération d'un jeton CSRF aléatoire
}