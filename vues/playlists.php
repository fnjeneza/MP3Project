<div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="./">
    <span class='glyphicon glyphicon-plus-sign'></span>
  </a>


  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
  <?php 
  foreach ($playlists as $playlist) {
		?>  
		<li> 
			<a href="./?action=addToPlaylist&id_chanson=<?=$chanson['id'];?>&id_playlist=<?=$playlist['id'];?>">
				<?= $playlist['nom_playlist'] ;?>
			</a> 
		</li>
	<?php }	?>
  </ul>
</div>
