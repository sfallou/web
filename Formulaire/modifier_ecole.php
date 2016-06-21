<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsEcole($bdd,$id_ecole){
		$req=$bdd->prepare('select * from Ecoles where id_ecole=:n1');
		$req->execute(array(
			':n1'=>$id_ecole
		));
		return $req->fetch();
	}

if(isset($_GET['id_ecole']) or !empty($_GET['id_ecole'])){

	$infos=recuperInformationsEcole($bdd,$_GET['id_ecole']);
	if(isset($_POST['nom_ecole']) and !empty($_POST['nom_ecole'])){
			$id_ecole=$_GET['id_ecole'];
			$nom_ecole=$_POST['nom_ecole'];
			$abrev=$_POST['abrev'];
			$points=$_POST['points'];
			$etat_ecole=$_POST["etat_ecole"];
			$requete=$bdd->query("Update Ecoles SET nom_ecole='$nom_ecole',abreviation='$abrev',points='$points',etat_ecole='$etat_ecole' where id_ecole=$id_ecole");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'école a été modifier avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_ecole.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion Ecole</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		  <table>
			<tr><td><label>Nom Ecole </label></td><td><input type="text" name="nom_ecole" value="<?php echo $infos['nom_ecole'];?>" class="form-control"></td></tr>
			<tr><td><label>Abreviation </label></td><td><input type="text" name="abrev" value="<?php echo $infos['abreviation'];?>" class="form-control"></td></tr>
			<tr><td><label>Points</label></td><td><input type="text" name="points" value="<?php echo $infos['points'];?>" class="form-control"></td></tr>
			<tr><td><label>Etat</label></td><td><input type="text" name="etat_ecole" value="<?php echo $infos['etat_ecole'];?>" class="form-control"></td></tr>
		  </table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_ecole.php" >Annuler</button></p>
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
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Ecole</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant de l'école</label></td><td><input type="text" name="id_ecole" class="form-control"></td></tr>
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

