
<table>
<tr>
<th>Titre</th>
<th>Artiste</th>
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
</tr>

<?php
 } 
?>
    
</table>