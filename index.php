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
require_once 'vues/headerBar.php';
//require_once 'vues/new_user.html';
	        require_once 'vues/message.php';
                require_once 'vues/add_song.html';
                
			
                require_once 'vues/player.php';
                require_once 'vues/list_view.php';
                //require_once 'vues/createplaylist.html';
                require_once 'vues/sideBar.php';
                
                
                
		?>
	</body>
</html>