<div class="panel panel-primary">
    <div class="panel-heading">Navigation</div> 
    <div class="panel-body">
<ul class="nav nav-pills nav-stacked">
  <li>
  	<div class="input-group" >
  		<input type="text" class="form-control" placeholder="Recherche" name="search">
  		<span class="input-group-btn">
  			<button class="btn btn-default "> <span class="glyphicon glyphicon-search"></span> Go!</button>
  		</span>
  	</div>
  	</li>
  	<!--<input type="text" placeholder="Recherche" name="search"> <a href="#" title="rechercher">Rechercher</a> --></li>
  <li><a href="#" title="dernier ajout">Dernier ajout</a></li>
  <li>Genre</li>
 
  <select name="genre">
  <?php 
  while($genre=$genres->fetch_assoc()){
  ?>	
      <option value="<?php echo $genre['genre'];?>"> <?= $genre['genre'] ;?> </option>
  <?php }
  ?>
 </select>
<?php if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] ){ ?>

  
  <li><button class="btn btn-link" data-toggle="modal" data-target="#addSong" title="ajouter une chanson">Ajouter une chanson</button></li>
  <li><button class="btn btn-link" data-toggle="modal" data-target="#creerPlaylist" title="créer playlist">Créer playlist</button></li>
  <ul>
      
  <?php
   require_once 'vues/add_song.html';
   require_once 'vues/createplaylist.html';
   ?>
   <li><a href="?action=allSongs">Toutes les chansons</a></li>
   <?php
   while ($playlist = $playlists->fetch_assoc()) {
		?>  
		<li> 
		<a href="./?action=getPlaylistSongs&id_playlist=<?= $playlist['id'] ;?>">
			<?= $playlist['nom_playlist'] ;?> 
		</a>
			<a href="./?action=deletePlaylist&nom=<?= $playlist['nom_playlist']?>" ><span class="glyphicon glyphicon-trash"></span></a>
		</li>
	<?php }
	
	?>
  </ul>
  
<?php } ?>  

  </ul>
 </div>
</div>