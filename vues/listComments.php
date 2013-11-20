
<ul>
<?php

while( isset($comments)&& $comment=$comments->fetch_assoc() ){
    echo "<li><img src='".$comment['url_photo']."' width=30 height=30 >".$comment['intitule']."</li>";;;
}

?>
</ul>