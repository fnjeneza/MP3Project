
<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container">
    <a class="navbar-brand" href="./">MP3Project</a>
	<?php
		if(!isset($_SESSION['isConnected'])){
	?>
    <div class="navbar-right">
    <button class="btn btn-success navbar-btn " data-toggle="modal" data-target="#connexion"><strong>Connexion</strong></button>
    <button class ="btn btn-primary navbar-btn"  data-toggle="modal" data-target="#creerCompte"><strong> Créer un compte</strong></button>
    </div>
    <FORM class="form-horizontal" role="form" METHOD="POST" ACTION="./">
    <div class="modal fade" id="connexion"> 
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title"> Connexion </h4>
                 </div>
                <div class="modal-body">
                	<div class="form-group">
	                 	<label for="pseudo" class="col-sm-3 control-label">Pseudo</label>
	                 	<div class="col-sm-8">
	                 		<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
	                 	</div>
	                 </div>
	                 <div class="form-group">
	                 	<label for="password" class="col-sm-3 control-label">Mot de passe</label>
	                 	<div class="col-sm-8	">
	                 		<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
	                 	</div>
	                 </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>  
                    <button class="btn btn-success" type="submit" name="action" value="connectUser">Connexion</button>
                      
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php require_once 'vues/new_user.html';?>
    
    <!-- 
    <form action="./" method ="post" enctype="multipart/form-data">
      <div class="modal fade" id="creerCompte"> 
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title"> Créer un compte </h4>
                 </div>
                <div class="modal-body">
                    <?php //require_once 'vues/new_user.html'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>  
                    <button type="submit" class="btn btn-success" name="action" value="addUser">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
    </form>
     -->
    
	<?php
		}
		else{ 
                    echo "<form action='./' method='POST'>";
                    echo $_SESSION['pseudo'].' <button class="btn btn-danger navbar-btn navbar-right" type="submit" name="action" value="deconnectUser">Déconnexion</button>';
                    echo "</form>";
		}
	?>
    </div>
</nav>
