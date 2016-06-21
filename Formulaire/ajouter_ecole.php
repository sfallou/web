<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouvelle Ecole</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role="form" action="traitement_ajout_ecole.php" method="post" enctype="multipart/form-data">
			<table>
			<tr><td><label>Nom complet de l'école </label></td><td><input type="text" name="nom_ecole" class="form-control" required></td></tr>
			<tr><td><label>Abréviation (code simple) </label></td><td><input type="text" name="abrev" class="form-control" required></td></tr>
			<tr><td><label>Nombre de points</label></td><td><input type="text" name="points" value="0"  class="form-control" required ></td></tr>
			<tr><td><label>Logo</label></td><td><input type="file"  name="logo" class="form-control" required ></td></tr>
		</table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Créer Ecole</button>
	<button class="btn btn-default" type="reset">Annuler</button></p>
	</form>
	</center>
	</div>
	</div>
	</div>
	</div>

<?php
require('footer.php');
?>
