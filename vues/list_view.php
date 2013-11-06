
<table>
<tr>
<th>Titre</th>
<th>Artiste</th>
</tr>

<?php
<<<<<<< HEAD
print_r($chansons);
=======
>>>>>>> ec891c92ab91a88e7e8a4977aa05b83de3f524c7
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