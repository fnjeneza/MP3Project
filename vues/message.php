<?php 
if(isset($messageError) && !empty ($messageError)){
	echo"<div>
	<h5> $messageError </h5>
        </div>";

}
elseif(isset($messageOk) && !empty($messageOk)) {
	
       echo" <div>
	<h5> $messageOk </h5>
        </div>";

}

?>

