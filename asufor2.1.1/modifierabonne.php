<?php
session_start();
require('header.php');
include('classes/utilisateurs.php');
include('connexion.php');

if(isset($_GET['id']) or !empty($_GET['id'])){
	global $abn;
	$abn=new abonne($_GET['id']);
	$infos=$abn->recuperInformationsAbonne($bdd);
	if(isset($_POST['cni']) and !empty($_POST['cni'])){
		$cni=$_POST['cni'];
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$tel=$_POST['tel'];
		$adresse=$_POST['adresse'];
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie du ';
		$t=$bdd->query('select montant_tarif from tarif where id_tarif=1');
		$tarif=$t->fetch();
		$abn->modifierAbonne($bdd, $cni, $nom, $prenom, $adresse, $tel,$tarif[0]);
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'abonné a été modifier avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="listeabonnes.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
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
		<form role='form' action="" method='post'>
			<table>
			<tr><td><label>Nom </label></td><td><input type="text" name="nom" value="<?php echo $infos['nom'];?>" class="form-control"></td></tr>
			<tr><td><label>Prenom </label></td><td><input type="text" name="prenom" value="<?php echo $infos['prenom'];?>" class="form-control"></td></tr>
			<tr><td><label>CNI</label></td><td><input type="text" name="cni" value="<?php echo $infos['cni'];?>" class="form-control"></td></tr>
			<tr><td><label>Téléphone</label></td><td><input type="text" name="tel" value="<?php echo $infos['telephone'];?>" class="form-control"></td></tr>
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
	}
}
else {
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Abonné</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant de l'abonné</label></td><td><input type="text" name="id" class="form-control"></td></tr>
				</table><br/><br/><br/>
				<p class="center col-md-5">
					<button class="btn btn-primary" type="submit">Enregistrer</button>
					<button class="btn btn-default" type="reset">Annuler</button>
				</p>
			</form>
		</center>
			</div>
		</div>
	</div>
</div>


<?php 
}
require('footer.php');
?>

