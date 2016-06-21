<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
	include('classes/utilisateurs.php');

 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouveau Abonné</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="traitement_ajout_abonne.php" method='post'>
			<table>
			<tr><td><label>Nom </label></td><td><input type="text" name="nom" class="form-control" required></td></tr>
			<tr><td><label>Prenom </label></td><td><input type="text" name="prenom" class="form-control" required></td></tr>
			<tr><td><label>CNI</label></td><td><input type="text" name="cni" class="form-control" required ></td></tr>
			<tr><td><label>Téléphone</label></td><td><input type="text" name="tel" class="form-control" required ></td></tr>
			<tr><td><label>Ancien Index</label></td><td><input type="text" name="index" class="form-control" required></td></tr>
			<tr><td><label>Adresse</label></td>
			<td><select name="adresse" class="form-control" required>
		<?php
			$village=$bdd->query("select * from villages");
			while($vil=$village->fetch()){
		?>
		<option value="<?php echo $vil['nom_village'];?>"><?php echo $vil['nom_village'];?></option>
		<?php } ?>
		</select></td></tr>
		<tr><td><label>Frais Abonnement</label></td><td><input type="number" name="frais" class="form-control" required></td></tr>
		<tr><td><label>Date Abonnement</label></td><td><input type="date" name="date_abonnement" class="form-control" required></td></tr>
		</table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>
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
