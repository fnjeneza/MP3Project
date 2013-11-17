
<div>
       <?php if( isset ($_SESSION['titre'])){?>
	<img alt="Nom de l'artiste" src="<?php echo $_SESSION['url_image'] ?>"
		width="100" height="100"><br> 
    
	<?=$_SESSION['titre']?><br>
	<a href="<?= $_SESSION['url'] ?>" target="_blank"><?=$_SESSION['artiste'] ?></a><br> 
	<?= $_SESSION['genre'] ?><br> 
	<?= $_SESSION['album'] ?>
	<?= $_SESSION['annee'] ?><br> 
        
        <?php }?>
              <object type="application/x-shockwave-flash" data="vues/dewplayer.swf"
		width="200" height="20" id="dewplayer" name="dewplayer">
		<param name="wmode" value="transparent" />
		
		<param name="flashvars" value="mp3=<?= $_SESSION['url_chanson'] ?>" />
	</object>
	<br>
	<a href="<?= $_SESSION['url_chanson'] ?>" download="<?=$_SESSION['titre']?>" >Download</a>
	<button>Commenter</button>
</div>