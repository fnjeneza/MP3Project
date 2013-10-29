
<div>
	<img alt="Nom de l'artiste" src="<?php echo $img_src ?>"
		width="100" height="100"><br> 
	Titre<br>
	<a href="http://www.wikipedia.fr" target="_blank">Artiste</a><br> 
	Genre<br> 
	Album
	Année<br> 
	Lien wiki<br>
	<object type="application/x-shockwave-flash" data="vues/dewplayer.swf"
		width="200" height="20" id="dewplayer" name="dewplayer">
		<param name="wmode" value="transparent" />
		
		<param name="flashvars" value="mp3=<?php echo $mp3_src ?>" />
	</object>
	<br>
	<button>Download</button>
	<button>Commenter</button>
	<button>Aimer</button>
</div>