<div class="panel panel-primary">
    <div class="panel-heading">Navigation</div> 
    <div class="panel-body">
<ul class="nav nav-pills nav-stacked">
  <li>
  <form action="./" method="get" >
  	<div class="input-group" >
  		<input type="text" class="form-control" placeholder="Recherche" name="search">
  		<div class="input-group-btn">
  			<!-- <button name="action" value="search_artiste" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span> Go!</button>-->
  			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <span class="glyphicon glyphicon-search"></span> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><button  class="btn btn-link" name="action" value="search_artiste" >Artiste</button></li>
			    <li><button class="btn btn-link" name="action" value="search_titre" >Titre</button></li>
			  </ul>
			</div>
  		</div>
  		</div>
  	</form>
  	</li>
  <!--  <li><a href="#" title="dernier ajout">Dernier ajout</a></li> -->
  <li>
	<div class="btn-group">
	  <!--  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	    Action <span class="caret"></span>
	  </button>-->
	  <button class="btn btn-link  dropdown-toggle"  data-toggle="dropdown" > Genre <span class="caret"></span> </button>
	  <ul class="dropdown-menu" role="menu">
	  <?php 
		  while($genre=$genres->fetch_assoc()){
		  ?>	
		      <li> <a href = "./?action=search_genre&search=<?php echo $genre['genre'];?>"> <?= $genre['genre'] ;?> </a></li>
		  <?php }
		  ?>
	  </ul>
	</div>  
  </li>
 
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