
<ul id="menu">
  <li><a href="#" title="rechercher">Rechercher</a></li>
  <li><a href="#" title="dernier ajout">Dernier ajout</a></li>
  <li>Genre</li>
  <?php $genres=getGenre($bdd)->fetch_assoc(); print_r($genres) ?>
  <select name="genre">
  <?php 
  
  foreach($genres as $genre){  	
  ?>	<option value="<?php $genre['genre']?>"> <?=$genre['genre']; ?></option>
  <?php }
  ?>
 </select>
<?php if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] ){ ?>

  <li><a href="#" title="ajouter une chanson">Ajouter une chanson</a></li>
  <li><a href="#" title="créer playlist">Créer playlist</a></li>
  <?php $results=getPlaylist($bdd, $_SESSION['pseudo'])->fetch_assoc();	?>
  <ul>
  <?php
  
   foreach($results as $result) {
		?>  <li> <?php echo $result['nom_playlist'] ;?> </li>
	<?php }
	
	?>
  </ul>
  
<?php } ?>  

  </ul>
 