
<table>
<tr>
<th>Titre</th>
<th>Artiste</th>
<th></th>
</tr>

<?php

while ($chanson=$chansons->fetch_assoc()) {
?>

<tr>
    <td>
    	<a href="./?id=<?=$chanson['id']?>&action=play"> <?=$chanson['titre']; ?>   </a>  
	</td>
	<td>
	    <?= $chanson['artiste'];?>
	</td>
        
        <td>
            <?php if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] ){ 
                echo "<a href='addSongToPlaylist.php'> ajouter à la playlist </a>";
            }
?>
            
            
        </td>
</tr>

<?php
 } 
?>
    
</table>