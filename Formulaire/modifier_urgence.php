<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsUrgence($bdd,$id_urgence){
		$req=$bdd->prepare('select * from Urgences where id_urgence=:n1');
		$req->execute(array(
			':n1'=>$id_urgence
		));
		return $req->fetch();
	}

if(isset($_GET['id_urgence']) or !empty($_GET['id_urgence'])){

	$urgence=recuperInformationsUrgence($bdd,$_GET['id_urgence']);
	if(isset($_POST['urgence']) and !empty($_POST['urgence'])){
			$id_urgence=$_GET['id_urgence'];
			$urgence=$_POST['urgence'];
			$detail_urgence=$_POST['detail'];
			$numeros_tel=$_POST["telephone"];
			$requete=$bdd->query("Update Urgences SET urgence='$urgence',detail_urgence='$detail_urgence',numeros_tel='$numeros_tel' where id_urgence=$id_urgence");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'urgence a été modifiée avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_urgences.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion Urgence</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		  <table>
			<tr><td><label>Urgence </label></td><td><input type="text" name="urgence" value="<?php echo $urgence['urgence'];?>" class="form-control"></td></tr>
			<tr><td><label>Détails </label></td><td><textarea name="detail"  class="form-control"><?php echo $urgence['detail_urgence'];?></textarea></td></tr>
			<tr><td><label>Téléphone</label></td><td><input type="text" name="telephone" value="<?php echo $urgence['numeros_tel'];?>" class="form-control"></td></tr>
		  </table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_urgences.php" >Annuler</button></p>
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
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Urgence</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant de l'urgence</label></td><td><input type="text" name="id_urgence" class="form-control"></td></tr>
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

