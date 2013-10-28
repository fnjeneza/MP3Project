<?php
define('BASE_MP3', $_SERVER['DOCUMENT_ROOT']."/MP3Project/multimedia/sounds/"); 	//url par défaut pour les mp3
define('BASE_IMG', $_SERVER['DOCUMENT_ROOT']."/MP3Project/multimedia/images/"); 	//url par défaut pour les images

require_once 'model/params.inc.php';
require_once 'model/model.inc.php';


$bdd=openConnection();		//ouverture d'une connexion

$message;	//message à afficher

//récupération de l'action de l'utilisateur
if(isset($_GET['action']) ){
	$action=$_GET['action'] ;
}
elseif (isset($_POST['action']) ){
	$action=$_POST['action'];
}

if(!empty($action)){
	switch ($action){
		case 'addSong':
			
			$url_chanson;
			$url_image=BASE_IMG."index.jpeg";	//chemin de l'image par defaut
			
			
			//verifie si la chanson existe deja dans la bdd
			if(songExist($bdd, $_POST['titre'],	$_POST['artiste'])){
				echo $message="Fichier existe déjà";
				break;
			}
			
			//enregistrement du fichier son
			if(isset($_FILES['chanson']) && !$_FILES['chanson']['error']){
				$url_chanson=BASE_MP3.$_POST['titre'].$_POST['artiste'].".mp3";
				move_uploaded_file($_FILES['chanson']['tmp_name'], $url_chanson);
			}
			
			//enregistrement du fichier image
			if(isset($_FILES['image']) && !$_FILES['image']['error']){
				$ext; //extension du fichier
				
				switch ($_FILES['image']['type']){
					case 'image/jpeg': 
					case 'image/pjpeg': 
						$ext=".jpg";
						break;
					case 'image/gif': 
						$ext=".gif";
						break;
					case 'image/png':
						$ext=".png";
						break;
				}
				$url_image=BASE_IMG.$_POST['album'].$ext;
				move_uploaded_file($_FILES['image']['tmp_name'], $url_image);
			}
			
			
			//ajout de la chanson
			addSong($bdd,
				$_POST['titre'],
				$_POST['artiste'],
				$_POST['genre'],
				$_POST['annee'],
				$_POST['album'],
				$url_image,
				$url_chanson,
				$_POST['url']);
			break;
	}
}


closeConnection($bdd); //fermeture de la connexion
