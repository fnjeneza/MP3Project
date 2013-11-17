<FORM METHOD="POST" ACTION="./">

	<h3>MP3Project</h3>
	<?php
		if(!isset($_SESSION['isConnected'])){
	?>
	
		connexion:<br> 
		<input type="text" name="pseudo" placeholder="Pseudo"><br> 
		<input type="password" name="password" placeholder='Mot de passe'><br>
		<button type="submit" name="action" value="connectUser">Connexion</button>
		<a href="./" title="creer un compte"> creer un compte</a>
                
	<?php
		}
		else{ 
			echo $_SESSION['pseudo'].' <button type="submit" name="action" value="deconnectUser">Déconnexion</button>';
		}
	?>
</FORM>