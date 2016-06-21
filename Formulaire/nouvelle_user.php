<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouvelle Urgence</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<section>
			<form action="traitementUser.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les paramètres de l'utilisateur</h3>
						 </br>

						 <div class = "texte">

						 <label>Nom : </br> <input name="nom" required></label>
						 </br>
						 </br>

						 <label>Login : </br> <input name="login"  required></label>
						 </br>
						 </br>

						 <label>Mot de passe : </br> <input type="password" name="mdp"  required></label>
						 </br>
						 </br>

						 <label>Profil : <select name="profil">
						 <option value="Challenge">Challenge</option>
						<option value="Photographe">Club Photo</option>
						<option value="Administrateur">Administrateur</option>
						 </select>
						 </label>
						 </br>
						 </br>

 						 <div class="button">
 						 <input style="width:150px" type="submit" value="Créer l'utilisateur">
        				 </div>
 						 </form>
					 
		</section>
	</center>
	</div>
	</div>
	</div>
	</div>

<?php
require('footer.php');
?>
