<div class="well">
       <?php if( isset ($_SESSION['titre'])){?>
<div class="row">
    <div class="col-md-3">
        <img class="img-rounded" alt="Nom de l'artiste" src="<?php echo $_SESSION['url_image'] ?>"
		width="150" height="175">
    </div>
    <div class="col-md-9">
		<h4><?=$_SESSION['titre']?></h4><br>
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
		<div style="padding-top: 10px">
	        <a class="btn btn-primary" href="<?= $_SESSION['url_chanson'] ?>" download="<?=$_SESSION['titre']?>" ><span class="glyphicon glyphicon-cloud-download" ></span></a>
			<button class="btn btn-primary" data-toggle="collapse" data-target="#comment"><span class="glyphicon glyphicon-comment" ></span></button>
		</div>
		<?php require_once 'vues/comments.html';?>
    </div>
</div>
</div>