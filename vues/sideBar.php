<div class="panel panel-primary">
    <div class="panel-heading">Navigation</div>
    <div class="panel-body">
<ul id="menu">
  <li><a href="#" title="rechercher">Rechercher</a></li>
  <li><a href="#" title="dernier ajout">Dernier ajout</a></li>
  
  <li>Genre</li>
 
  <select name="genre">
  <?php 
  while($genre=$genres->fetch_assoc()){
     //print_r($genre); 
  ?>	
      <option value="<?php echo $genre['genre'];?>"> <?= $genre['genre'] ;?> </option>
  <?php }
  ?>
 </select>
<?php if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] ){ ?>

  
  <li><button data-toggle="modal" data-target="#addSong" title="ajouter une chanson">Ajouter une chanson</button></li>
  <li><a href="#" title="créer playlist">Créer playlist</a></li>
  <ul>
      
  <?php
            require_once 'vues/add_song.html';
   while ($playlist = $playlists->fetch_assoc()) {
		?>  
		<li> 
			<?php echo $playlist['nom_playlist'] ;?> 
			<a href="./?action=deletePlaylist&nom=<?= $playlist['nom_playlist']?>" >Supprimer</a>
		</li>
	<?php }
	
	?>
  </ul>
  
<?php } ?>  

  </ul>
        </div>
</div>