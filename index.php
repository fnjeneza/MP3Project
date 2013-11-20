<?php 
 session_start();	//ouverture de la session

require_once 'controller/controller.inc.php';
?>
<html>
	<head>
		<meta charset="UTF-8">
                <script src="js/jquery.js" type="text/javascript"></script>
                <script src="js/bootstrap.min.js" type="text/javascript"></script>
                <script type="text/javascript"src="js/mp3.js"></script>
                <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<title>MP3Project</title>
	</head>
	<body>
		<?php 
			require_once 'vues/headerBar.php'; 
		?>
            <div class="container">
                <div class="row">
                    <div class="col-md-3"> 
                            <?php require_once 'vues/sideBar.php'; ?> 
                    </div>
                    
                    <div class="col-md-8 col-md-offset-1">
                        <?php 
	                        require_once 'vues/message.php';
	                        require_once 'vues/player.php'; 
	                    ?> 
                        <div class="songs"><?php require_once 'vues/list_view.php'; ?></div>
                        <div class="commentaire"><?php require_once 'vues/listComments.php'; ?></div>
                        
                    </div>
                </div>
            </div>

	</body>
</html>