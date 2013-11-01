<?php
define('BASE_MP3', $_SERVER['DOCUMENT_ROOT']."/MP3Project/multimedia/sounds/"); 	//url par défaut pour les mp3
define('BASE_IMG', $_SERVER['DOCUMENT_ROOT']."/MP3Project/multimedia/images/"); 	//url par défaut pour les images

require_once 'model/params.inc.php';
require_once 'model/model.inc.php';


$bdd=openConnection();		//ouverture d'une connexion

$chansons=getSongs($bdd);
//print_r($chansons);

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
				
			$url_image="multimedia/images/index.jpeg";	//chemin de l'image par defaut
			//$url_chanson;


			//verifie si la chanson existe deja dans la bdd
			if(songExist($bdd, $_POST['titre'],	$_POST['artiste'])){
				$message="Fichier existe déjà";
				break;
			}

			//enregistrement du fichier son
			if(isset($_FILES['chanson']) && !$_FILES['chanson']['error']){

				//si le fichier n'est pas de type mp3
				if($_FILES['chanson']['type']=="audio/mpeg" || $_FILES['chanson']['type']=="audio/mp3"){
						
					$path_chanson=BASE_MP3.$_POST['titre'].$_POST['artiste'].".mp3";
					$url_chanson="multimedia/sounds/".$_POST['titre'].$_POST['artiste'].".mp3";
					move_uploaded_file($_FILES['chanson']['tmp_name'], $path_chanson);
				}
				else{
					break;
				}
			}

			//enregistrement du fichier image
			if(isset($_FILES['image']) && !$_FILES['image']['error']){

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

				$path_image=BASE_IMG.$_POST['album'].$ext;
				$url_image="multimedia/images/".$_POST['album'].$ext;
				move_uploaded_file($_FILES['image']['tmp_name'], $path_image);
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

		case 'addUser':

			/*
			 * verifie si l'utilisateur existe
			 */
			if(existUser($bdd,$_POST['pseudo'])){
				$message='Ce pseudo existe déja';
				break;
			}


			$url_photo="multimedia/images/userDefault.jpg";
				
			if(isset($_FILES['photo']) && !$_FILES['photo']['error']){

				switch ($_FILES['photo']['type']){
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
				$path_photo=BASE_IMG.$_POST['pseudo'].$ext;
				$url_photo="multimedia/images/".$_POST['pseudo'].$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], $path_photo);
			}
				
			// ajout d'un utilisateur
			 
			addUser($bdd,
					$_POST['nom'],
					$_POST['prenom'],
					$_POST['sexe'],
					$_POST['pseudo'],
					$_POST['password'],
					$_POST['birthday'],
					$_POST['mail'],
					$url_photo);

			break;
				
		case 'connectUser':
			if(connectUser($bdd, $_POST['pseudo'], $_POST['password'])){

				$_SESSION['isConnected']=true;
				$_SESSION['pseudo']=$_POST['pseudo'];
			}
			else{
				//message d'erreur à afficher
				$message="Pseudo ou mot de passe incorrect";
			}
			break;
				
		case 'deconnectUser':
			if(isset($_SESSION['isConnected']) && $_SESSION['isConnected']){

				//destruction des variables de la  session
				unset($_SESSION['isConnected']);
				unset($_SESSION['pseudo']);

			}
			break;

		case 'play':
			$result=  getOneSong($bdd, $_GET['id'])->fetch_assoc();
			 
			$_SESSION['url_image']=$result['url_image'];
			$_SESSION['url_chanson']=$result['url_chanson'];
			 
			break;


	}
}



closeConnection($bdd); //fermeture de la connexion
