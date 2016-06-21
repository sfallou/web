<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsInfo($bdd,$id_info){
		$req=$bdd->prepare('select * from Infos where id_info=:n1');
		$req->execute(array(
			':n1'=>$id_info
		));
		return $req->fetch();
	}

if(isset($_GET['id_info']) or !empty($_GET['id_info'])){

	$infos=recuperInformationsInfo($bdd,$_GET['id_info']);
	if(isset($_POST['titre']) and !empty($_POST['titre'])){
			$id_info=$_GET['id_info'];
			$titre=$_POST['titre'];
			$contenu=$_POST['contenu'];
			$date_info=$_POST['date_info'];
			$heure_info=$_POST["heure_info"];
			$requete=$bdd->query("Update Infos SET titre='$titre',contenu='$contenu',date_info='$date_info',heure_info='$heure_info' where id_info=$id_info");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'école a été modifier avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_infos.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion Info</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		  <table>
			<tr><td><label>Titre </label></td><td><input type="text" name="titre" value="<?php echo $infos['titre'];?>" class="form-control"></td></tr>
			<tr><td><label>Contenu </label></td><td><textarea name="contenu"  class="form-control"><?php echo $infos['contenu'];?></textarea></td></tr>
			<tr><td><label>Date</label></td><td><input type="text" name="date_info" value="<?php echo $infos['date_info'];?>" class="form-control"></td></tr>
			<tr><td><label>Heure</label></td><td><input type="text" name="heure_info" value="<?php echo $infos['heure_info'];?>" class="form-control"></td></tr>
		  </table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_infos.php" >Annuler</button></p>
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
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Info</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant de l'info</label></td><td><input type="text" name="id_info" class="form-control"></td></tr>
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

