<?php 
 session_start();	//ouverture de la session

require_once 'controller/controller.inc.php';
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>MP3Project</title>
	</head>
	<body>
		<?php 
			//require_once 'vues/headerBar.php';
			
			require_once 'vues/add_song.html';
		?>
	</body>
</html>