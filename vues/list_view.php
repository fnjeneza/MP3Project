
<table class="table table-hover table-striped table-condensed" >

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
                echo "<a class='btn' href='addSongToPlaylist.php'> <span class='glyphicon glyphicon-plus-sign'></span> </a>";
            }
?>
            
            
        </td>
</tr>

<?php
 } 
?>
    
</table>