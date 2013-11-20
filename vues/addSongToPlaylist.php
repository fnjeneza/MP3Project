<?php

echo"<ul>";
while($playlist=$playlists->fetch_assoc()){
 echo"<li><input type='radio' name='playlist' value='$playlist'> $playlist</li>";   
 
}

echo"</ul>";
echo"<button type='submit' name='action' value='addSongToPlaylist'> Ajouter </button>";


?>
