<?php
define('HOSTNAME', "localhost");
define('DBNAME' , "mp3_db");
define('USERNAME', "root");
define('PASSWORD', "123456");

/*
 * Connexion à la base de données
*/
function openConnection(){
	$db=new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);
	if($db->error){
		die("Erreur de connexion".$db->error);
	}
	return $db;
}

function closeConnection($bdd){
	$bdd->close;
}
