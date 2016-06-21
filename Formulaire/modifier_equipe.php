<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsEquipe($bdd,$id_equipe){
		$req=$bdd->prepare('select * from Equipes where id_equipe=:n1');
		$req->execute(array(
			':n1'=>$id_equipe
		));
		return $req->fetch();
	}

if(isset($_GET['id_equipe']) or !empty($_GET['id_equipe'])){

	$infos=recuperInformationsEquipe($bdd,$_GET['id_equipe']);
	if(isset($_POST['nom_equipe']) and !empty($_POST['nom_equipe'])){
			$id_equipe=$_GET['id_equipe'];
			$nom_equipe=$_POST['nom_equipe'];
			$type_equipe=$_POST['type_equipe'];
			$type_sport=$_POST['type_sport'];
			$id_ecole=$_POST["id_ecole"];
			$etat_equipe=$_POST["etat_equipe"];
			$requete=$bdd->query("Update Equipes SET nom_equipe='$nom_equipe',type_equipe='$type_equipe',type_sport='$type_sport',id_ecole='$id_ecole',etat_equipe='$etat_equipe' where id_equipe=$id_equipe");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'équipe a été modifier avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_equipes.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion Equipe</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		  <table>
			<tr><td><label>Nom Equipe </label></td><td><input type="text" name="nom_equipe" value="<?php echo $infos['nom_equipe'];?>" class="form-control"></td></tr>
			<tr><td><label>Type Equipe </label></td><td><input type="text" name="type_equipe" value="<?php echo $infos['type_equipe'];?>" class="form-control"></td></tr>
			<tr><td><label>Type Sport</label></td><td><input type="text" name="type_sport" value="<?php echo $infos['type_sport'];?>" class="form-control"></td></tr>
			<tr><td><label>id Ecole</label></td><td><input type="text" name="id_ecole" value="<?php echo $infos['id_ecole'];?>" class="form-control"></td></tr>
			<tr><td><label>Etat</label></td><td><input type="text" name="etat_equipe" value="<?php echo $infos['etat_equipe'];?>" class="form-control"></td></tr>
		  </table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_equipes.php" >Annuler</button></p>
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
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Equipe</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant de l'équipe</label></td><td><input type="text" name="id_equipe" class="form-control"></td></tr>
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

