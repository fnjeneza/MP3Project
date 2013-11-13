
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

  <li><a href="#" title="ajouter une chanson">Ajouter une chanson</a></li>
  <li><a href="#" title="créer playlist">Créer playlist</a></li>
  <ul>
  <?php
  
   while ($playlist = $playlists->fetch_assoc()) {
		?>  
		<li> 
			<?php echo $playlist['nom_playlist'] ;?> 
			<button>Supprimer</button>
		</li>
	<?php }
	
	?>
  </ul>
  
<?php } ?>  

  </ul>
 