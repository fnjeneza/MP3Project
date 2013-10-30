<?php


/*
 * Ouverture d'une connexion à la bdd
 */
function openConnection(){
	$db=new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);
	if($db->error){
		die("Erreur de connexion".$db->error);
	}	
	return $db;
}

/*
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
 * @param unknown_type $image	image de l'album ou de l'artiste
 * @param unknown_type $duree	duree du morceau
 * @param unknown_type $chemin	chemin du morceau sur le serveur
 * @param unknown_type $url	lien wiki de l'artiste
 */
function addSong($bdd, $titre, $artiste, $genre, $annee, $album, $url_image, $duree, $url_chanson, $url_wiki ){
	
	if(!artistExist($bdd, $artiste)){		//verfie si l'artiste existe deja dans la bdd
		addArtist($bdd, $artiste, $url_wiki);	// sinon ajoute l'artiste dans la bdd
	}
	
	$req="INSERT INTO chanson (titre, artiste, genre, annee, album, image, chemin, date_ajout)
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

function addUser($bdd, $nom, $prenom, $pseudo, $password, $sexe, $dateNaiss, $mail, $url_photo){
    
    $req="INSERT INTO utilisateur (nom_utilisateur,prenom_utilisateur,pseudo, password,sexe,date_de_naissance,email,url_photo)
                                  VALUES('$nom', '$prenom', '$pseudo','$password', '$sexe', '$dateNaiss', '$mail', '$url_photo')";
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
    $req="DELETE FROM utilisateur WHERE pseudo='$pseudo";
    $bdd->query($req);
}

function deletePlaylist($bdd, $nom, $pseudo) {
    $req="DELETE FROM playlist WHERE nom_playlist='$nom' AND pseudo='$pseudo'";
    $bdd->query($req);
}

function existUser($bdd, $pseudo){
    $req="SELECT * FROM utilisateur WHERE pseudo= '$pseudo'";
    $result=$bdd->query($req);
    return $result->num_rows==0 ? false : true;
}

function connectUser($bdd , $pseudo ,$password){
    
    if(!(existUser($bdd, $pseudo))){
        echo'Bienvenu pseudo ';
    }
    else{
        echo'utilisateur ou mot de passe incorrect!!!';
    }
}

