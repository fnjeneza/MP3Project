<?php 
	$src="multimedia/images/Cover.jpg";
	$sound="multimedia/sounds/test.mp3";
	$player="vues/dewplayer.swf"
?>
<div>
	<img alt="Nom de l'artiste" src="<?php echo $src ?>"
		width="100" height="100"><br> 
	Titre<br>
	Artiste<br> 
	Genre<br> 
	Album
	Année<br> 
	Lien wiki<br>
	<object type="application/x-shockwave-flash" data="<?php echo $player ?>"
		width="200" height="20" id="dewplayer" name="dewplayer">
		<param name="wmode" value="transparent" />
		<param name="movie" value="<?php echo $player ?>" />
		<param name="flashvars" value="mp3=<?php echo $sound ?>" />
	</object>
	<br>
	<button>Download</button>
	<button>Commenter</button>
	<button>Aimer</button>
</div>