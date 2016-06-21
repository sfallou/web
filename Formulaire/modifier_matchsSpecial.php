<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsMatchSpecial($bdd,$id_match_special){
		$req=$bdd->prepare('select * from MatchsSpecial where id_match_special=:n1');
		$req->execute(array(
			':n1'=>$id_match_special
		));
		return $req->fetch();
	}

if(isset($_GET['id_match_special']) or !empty($_GET['id_match_special'])){
	$infos=recuperInformationsMatchSpecial($bdd,$_GET['id_match_special']);
	if(isset($_POST['equipe']) and !empty($_POST['equipe'])){
			$id_match_special=$_GET['id_match_special'];
			$equipe=$_POST['equipe'];
			$sport=$_POST['sport'];
			$classement=$_POST['classement'];

			$requete=$bdd->query("Update MatchsSpecial SET sport='$sport',equipe='$equipe',classement_equipe='$classement' where id_match_special=$id_match_special");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>le match a été modifier avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_matchsSpecial.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion Match Spécial</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		  <table>
			<tr><td><label>Sport </label></td><td><input type="text" name="sport" value="<?php echo $infos['sport'];?>" class="form-control"></td></tr>
			<tr><td><label>Equipe/Joueur</label></td><td><input type="text" name="equipe" value="<?php echo $infos['equipe'];?>" class="form-control"></td></tr>
			<tr><td><label>Classement</label></td><td><input type="text" name="classement" value="<?php echo $infos['classement_equipe'];?>" class="form-control"></td></tr>
		  </table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_matchsSpecial.php" >Annuler</button></p>
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
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Match Spécial</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant du match Spécial</label></td><td><input type="text" name="id_match_special" class="form-control"></td></tr>
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

