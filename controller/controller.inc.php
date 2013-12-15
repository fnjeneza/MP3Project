<?php
define('BASE_MP3', $_SERVER['DOCUMENT_ROOT']."/MP3Project/multimedia/sounds/"); 	//url par défaut pour les mp3
define('BASE_IMG', $_SERVER['DOCUMENT_ROOT']."/MP3Project/multimedia/images/"); 	//url par défaut pour les images

require_once 'model/params.inc.php';
require_once 'model/model.inc.php';


$bdd=openConnection();		//ouverture d'une connexion


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
			

			//verifie si la chanson existe deja dans la bdd
			if(songExist($bdd, $_POST['titre'], $_POST['artiste'])){
				$messageError="Cette chanson existe déjà";
				break;
			}
			
			$_titre = str_replace("'", "\'", $_POST['titre']);
			$_genre = str_replace("'", "\'", $_POST['genre']);
			$_album = str_replace("'", "\'", $_POST['album']);
			$_artiste = str_replace("'", "\'", $_POST['artiste']);
			$_url = str_replace("'", "\'", $_POST['url']);
			
			//enregistrement du fichier son
			if(isset($_FILES['chanson']) && !$_FILES['chanson']['error']){

				//si le fichier n'est pas de type mp3
				if($_FILES['chanson']['type']=="audio/mpeg" || $_FILES['chanson']['type']=="audio/mp3"){

					$path_chanson=BASE_MP3.$_POST['titre'].$_POST['artiste'].".mp3";
					$url_chanson="multimedia/sounds/".$_POST['titre'].$_artiste.".mp3";
					move_uploaded_file($_FILES['chanson']['tmp_name'], $path_chanson);
				}
				else{
					echo $messageError="Ce type de fichier n'est pas accepté !";
						
					break;
				}
					
			}
			else {
				$messageError="Erreur de Upload";
                                break;
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
					$_titre,
					$_artiste,
					$_genre,
					$_POST['annee'],
					$_album,
					$url_image,
					$url_chanson,
					$_url);
				
			$messageOk="Chanson ajoutée avec succès!";

			break;

		case 'addUser':

			/*
			 * verifie si l'utilisateur existe
			 */
			if(existUser($bdd,$_POST['pseudo'])){
				$messageError='Ce pseudo existe déja';
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
					$_POST['pseudo'],
					$_POST['sexe'],
					$_POST['password'],
					$_POST['birthday'],
					$_POST['mail'],
					$url_photo);
			$messageOk="Utilisateur ajouté";
			break;

		case 'connectUser':
			if(connectUser($bdd, $_POST['pseudo'], $_POST['password'])){

				$_SESSION['isConnected']=true;
				$_SESSION['pseudo']=$_POST['pseudo'];
				$messageOk="Connexion acceptée";
			}
			else{
				//message d'erreur à afficher

				$messageError="Pseudo ou mot de passe incorrect";
			}
			break;

		case 'deconnectUser':
			if(isset($_SESSION['isConnected']) && $_SESSION['isConnected']){

				//destruction des variables de la  session
				unset($_SESSION['isConnected']);
				unset($_SESSION['pseudo']);
				$messageOk="Vous etes déconnecté";

			}
			break;

		case 'play':
			$song =  getOneSong($bdd, $_GET['id'])->fetch_assoc();
			
			// id chanson qui est utilisé pour l'ajout des commentaires
			$_SESSION['id_chanson']=$_GET['id'];
			
			$_SESSION['url_image']=$song['url_image'];
			$_SESSION['url_chanson']=$song['url_chanson'];
				
			$_SESSION['artiste']=$song['artiste'];
			$_SESSION['titre']=$song['titre'];
			$_SESSION['genre']=$song['genre'];
			$_SESSION['url']=$song['url_wiki'];
			$_SESSION['album']=$song['album'];
			$_SESSION['annee']=$song['annee'];
                   
			//récuperation des commentaires du morceau en cours de lecture
            $comments=  getComments($bdd, $_SESSION['id_chanson']);
            //$_SESSION['comments'] =  getComments($bdd, $_SESSION['id_chanson']);
                    
			break;
				
		case 'addPlaylist':
			//Test si la playlist existe déjà
			 if(playlistExist($bdd, $_GET['nomplaylist'] , $_SESSION['pseudo'])){
			 	$messageError="La playlist existe déjà";
			 }
			 else{
			 	addPlaylist($bdd, $_GET['nomplaylist'] , $_SESSION['pseudo']) ;
				$messageOk='Playlist ajouté avec succès';
			 }
			break;
				
		case'addComment':
				
			addComment($bdd, $_SESSION['pseudo'], $_GET['commentaire'] , $_SESSION['id_chanson']);
			$messageOk = "Commentaire ajouté!";
			break;
			
		case 'deletePlaylist':
			deletePlaylist($bdd, $_GET['nom'], $_SESSION['pseudo']);
			$messageOk="Playlist ".$_GET['nom']." supprimé";
			break;
			
		case 'addToPlaylist':
			//verifie si la chanson existe deja dans la bdd
			if(songExistInPlaylist($bdd, $_GET['id_playlist'], $_GET['id_chanson'])){
				$messageError="Cette chanson existe déjà dans la playlist";
				break;
			}
			addSongToPlaylist($bdd, $_GET['id_playlist'], $_GET['id_chanson']);
			break;
			
		case 'getPlaylistSongs':
			$_SESSION['id_playlist'] = $_GET['id_playlist'];
			break;
			
		case 'allSongs':
			unset($_SESSION['id_playlist']);
			break;

	}
}


if (isset($_GET['search']) && !empty($_GET['search'])){
	unset($_SESSION['id_playlist']);
	switch ($_GET['action']){
		case 'search_artiste':
			$chansons  = search_artiste($bdd, $_GET['search']);
			break;
		case 'search_titre':
			$chansons  = search_titre($bdd, $_GET['search']);
			break;
		case 'search_genre':
			$chansons = search_genre($bdd, $_GET['search']);
			break;
	}
}
elseif(isset($_SESSION['id_playlist']) && !empty($_SESSION['id_playlist'])){
	$chansons= getSongFromPlaylists($bdd, $_SESSION['id_playlist']);
}
else{
	$chansons=getSongs($bdd);
}

  
//tous les genres existants dans la bdd
$genres=getGenre($bdd);
if(isset($_SESSION['isConnected']) && $_SESSION['isConnected']){
	//liste de playlist de l'utilisateur
	$playlists = getPlaylist($bdd, $_SESSION['pseudo']);
}

closeConnection($bdd); //fermeture de la connexion
