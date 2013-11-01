
<table>
<tr>
<th>Titre</th>
<th>Artiste</th>
</tr>

<?php

while ($chanson=$chansons->fetch_assoc()) {


?>
<tr>
    <td><a href="./?id=<?=$chanson['id']?>&action=play">
    <?php
        echo $chanson['titre']; 
    ?>
        </a>  
</td>
<td>
    <?php
       echo $chanson['artiste']; 
    ?>
</td>
</tr>
    
</table>
<?php
}
?>