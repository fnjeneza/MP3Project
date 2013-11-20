
<?php
if(isset($comments) ){
?>
	<div class="panel panel-info">
    <div class="panel-heading">
        Commentaires
    </div>
    <div class="panel-body">
     <ul class="media-list">
<?php 
        while( $comment=$comments->fetch_assoc() ){
  ?>
      <li class="media">
          <img class="media-object pull-left" src="<?=$comment['url_photo']?>" width=30 height=30 >
          <div class="media-body">
            <?=$comment['intitule']?>
          </div>
      </li>
<?php

	}
}
?>
       </ul>
    </div>
        
</div>