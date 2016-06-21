<?php
	session_start();
	require('header.php');
	require('connexion.php');
	include('classes/utilisateurs.php');
if(isset($_POST['cni']) and !empty($_POST['cni'])){
	$cni=$_POST['cni'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$tel=$_POST['tel'];
	$adresse=$_POST['adresse'];
	$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie du ';
	//~ if(!isset($nom) or empty($nom))
		//~ $msg.=$nom;
	//~ 
	//~ if(!isset($prenom) or empty($prenom))
		//~ $msg.=$prenom;
	//~ 
	//~ if(!isset($tel) or empty($tel))
		//~ $msg.=$tel;
	//~ 
	//~ if(!isset($adresse) or empty($adresse))
		//~ $msg.=$adresse;
	//~ if()
	$t=$bdd->query('select montant_tarif from tarif where id_tarif=1');
	$tarif=$t->fetch();
	abonne::ajouterAbonne($bdd, $cni, $nom, $prenom, $adresse, $tel,$tarif[0]);
	?>
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'abonné a été ajouté avec succes.
     </div><?php }?>
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
		<form role='form' action="" method='post'>
			<table>
			<tr><td><label>Nom </label></td><td><input type="text" name="nom" class="form-control"></td></tr>
			<tr><td><label>Prenom </label></td><td><input type="text" name="prenom" class="form-control"></td></tr>
			<tr><td><label>CNI</label></td><td><input type="text" name="cni" class="form-control"></td></tr>
			<tr><td><label>Téléphone</label></td><td><input type="text" name="tel" class="form-control"></td></tr>
			<tr><td><label>Adresse</label></td>
			<td><select name="adresse" class="form-control">
		<?php
			$village=$bdd->query("select * from villages");
			while($vil=$village->fetch()){
		?>
		<option value="<?php echo $vil['nom_village'];?>"><?php echo $vil['nom_village'];?></option>
		<?php } ?>
		</select></td></tr>
		</table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>
	<button class="btn btn-default" type="reset">Enregistrer</button></p>
	</form>
	</center>
	</div>
	</div>
	</div>
	</div>

<?php
require('footer.php');
?>
