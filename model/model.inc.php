<?php


/**
 * Ouverture d'une connexion à la bdd
 */
function openConnection(){
	$db=new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);
	if($db->error){
		die("Erreur de connexion".$db->error);
	}	
	return $db;
}

/**
 * fermeture de la connexion
 */
function closeConnection($bdd){
	$bdd->close();
	unset($bdd); 	//destruction de la variable de connexion
}
/**
 * Verifie si artiste est dans la bdd
 * @param unknown_type $bdd
 * @param unknown_type $artiste
 */
function artistExist($bdd, $artiste){
	$req="SELECT nom FROM artiste WHERE nom='$artiste'";
	return $bdd->query($req)->num_rows == 0 ? false : true;
}

/**
 * Ajout d'artiste
 * @param unknown_type $bdd
 * @param unknown_type $artiste
 * @param unknown_type $url
 */
function addArtist($bdd, $artiste, $url){
	$req="INSERT INTO artiste (nom, url) VALUES ('$artiste', '$url')";
	$bdd->query($req);
}

/**
 * 
 * @param unknown_type $bdd		instance de la base de données
 * @param unknown_type $titre	titre du morceau
 * @param unknown_type $artiste	nom de l'artiste
 * @param unknown_type $genre	genre de chanson
 * @param unknown_type $annee	annee de sortie
 * @param unknown_type $album	album de la chanson
 * @param unknown_type $date_ajout	date d'ajout
 * @param unknown_type $url_image	image de l'album ou de l'artiste
 * @param unknown_type $url_chanson	chemin du morceau sur le serveur
 * @param unknown_type $url_artiste	lien wiki de l'artiste
 */
function addSong($bdd, $titre, $artiste, $genre, $annee, $album, $url_image, $url_chanson, $url_artiste ){
	
	if(!artistExist($bdd, $artiste)){		//verfie si l'artiste existe deja dans la bdd
		addArtist($bdd, $artiste, $url_artiste);	// sinon ajoute l'artiste dans la bdd
	}
	
	$req="INSERT INTO chanson (titre, artiste, genre, annee, album, url_image, url_chanson, date_d_ajout)
		VALUES ('$titre','$artiste','$genre', $annee, '$album', '$url_image', '$url_chanson', CURDATE() )";
	
	$bdd->query($req);
}

/**
 * verifie si une chanson existe deja dans la bdd
 * @param unknown_type $bdd
 * @param unknown_type $titre
 * @param unknown_type $artiste
 */
function songExist($bdd, $titre, $artiste){
	$req="SELECT * FROM chanson WHERE titre='$titre' AND artiste='$artiste'";
	return $bdd->query($req)->num_rows == 0 ?  false :  true;
}

/**
 * Ajout d'un utilisateur 
 * @param unknown_type $bdd
 * @param unknown_type $nom
 * @param unknown_type $prenom
 * @param unknown_type $pseudo
 * @param unknown_type $sexe
 * @param unknown_type $password
 * @param unknown_type $dateNaiss
 * @param unknown_type $mail
 * @param unknown_type $url_photo
 */
function addUser($bdd, $nom, $prenom, $pseudo, $sexe, $password, $dateNaiss, $mail, $url_photo){
    
    $req="INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, sexe, pseudo, password,  date_de_naissance, email, url_photo)
                                  VALUES('$nom', '$prenom', '$pseudo', '$sexe', '$password',  STR_TO_DATE('$dateNaiss','%d/%m/%Y'), '$mail', '$url_photo')";

 	$bdd->query($req) ;
}

function deleteSong($bdd, $titre, $artiste){
    $req="DELETE FROM chanson WHERE titre='$titre' AND artiste='$artiste'";
    $bdd->query($req);
}

function deleteArtiste($bdd, $nom){
    $req="DELETE FROM artiste WHERE nom='$nom'";
    $bdd->query($req);
}

function deleteUser($bdd, $pseudo){
    $req="DELETE FROM utilisateur WHERE pseudo='$pseudo'";
    $bdd->query($req);
}

function deletePlaylist($bdd, $nom, $pseudo) {
    $req="DELETE FROM playlist WHERE nom_playlist='$nom' AND pseudo='$pseudo'";
    $bdd->query($req);
}
/**
 * Verifie si un utilisateur existe
 * @param unknown_type $bdd
 * @param unknown_type $pseudo
 * @return boolean
 */
function existUser($bdd, $pseudo){
    $req="SELECT * FROM utilisateur WHERE pseudo= '$pseudo'";
    return $bdd->query($req)->num_rows==0 ? false : true;
}

/**
 * Connexion de l'utilisateur
 * @param unknown_type $bdd
 * @param unknown_type $pseudo
 * @param unknown_type $password
 */
function connectUser($bdd , $pseudo ,$password){
    
    $req =" SELECT * FROM utilisateur WHERE pseudo ='$pseudo' AND password ='$password'";
    return $bdd->query($req)->num_rows==0 ? false : true;
}

