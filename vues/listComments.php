
<?php
if(isset($comments) && !empty($comments->num_rows)){
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
          <img class="media-object pull-left" src="<?=$comment['url_photo']?>" width=40 height=40 >
          <div class="media-title">
          	<?php echo $comment['pseudo_commentateur']." ".$comment['date_commentaire'];?>
          </div>
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