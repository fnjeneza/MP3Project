<?php 
if(isset($messageError) && !empty ($messageError)){
	echo"<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			$messageError 
        </div>";
	unset($messageError);

}
elseif(isset($messageOk) && !empty($messageOk)) {
	echo"<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			$messageOk 
		</div>";
	unset($messageOk);

}

?>

