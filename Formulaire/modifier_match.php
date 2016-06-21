<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsMatch($bdd,$id_match){
		$req=$bdd->prepare('select * from Matchs where id_match=:n1');
		$req->execute(array(
			':n1'=>$id_match
		));
		return $req->fetch();
	}

if(isset($_GET['id_match']) or !empty($_GET['id_match'])){

	$infos=recuperInformationsMatch($bdd,$_GET['id_match']);
	if(isset($_POST['equipe1']) and !empty($_POST['equipe1']) and isset($_POST['equipe2']) and !empty($_POST['equipe2']) ){
			$id_match=$_GET['id_match'];
			$equipe1=$_POST['equipe1'];
			$equipe2=$_POST['equipe2'];
			$sport=$_POST['sport'];
			$date_match=$_POST['date_match'];
			$heure_match=$_POST['heure_match'];
			$lieu_match=$_POST['lieu_match'];
			$score1=$_POST['score1'];
			$score2=$_POST['score2'];
			$phase=$_POST['phase'];
			$etat_match=$_POST["etat_match"];
			$poule=$_POST['poule'];
			$requete=$bdd->query("Update Matchs SET sport='$sport',equipe1='$equipe1',equipe2='$equipe2',date_match='$date_match',heure_match='$heure_match',lieu='$lieu_match',score1='$score1',score2='$score2',phase='$phase',etat='$etat_match',poule='$poule' where id_match=$id_match");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>le match a été modifier avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_matchs.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion Matchs</h2>

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
			<tr><td><label>Equipe1</label></td><td><input type="text" name="equipe1" value="<?php echo $infos['equipe1'];?>" class="form-control"></td></tr>
			<tr><td><label>Equipe2</label></td><td><input type="text" name="equipe2" value="<?php echo $infos['equipe2'];?>" class="form-control"></td></tr>
			<tr><td><label>Score1</label></td><td><input type="text" name="score1" value="<?php echo $infos['score1'];?>" class="form-control"></td></tr>
			<tr><td><label>Score2</label></td><td><input type="text" name="score2" value="<?php echo $infos['score2'];?>" class="form-control"></td></tr>
			<tr><td><label>Date Match</label></td><td><input type="text" name="date_match" value="<?php echo $infos['date_match'];?>" class="form-control"></td></tr>
			<tr><td><label>Heure Match</label></td><td><input type="text" name="heure_match" value="<?php echo $infos['heure_match'];?>" class="form-control"></td></tr>
			<tr><td><label>Lieu</label></td><td><input type="text" name="lieu_match" value="<?php echo $infos['lieu'];?>" class="form-control"></td></tr>
			<tr><td><label>Phase</label></td><td><input type="text" name="phase" value="<?php echo $infos['phase'];?>" class="form-control"></td></tr>
			<tr><td><label>Poule</label></td><td><input type="text" name="poule" value="<?php echo $infos['poule'];?>" class="form-control"></td></tr>
			<tr><td><label>Etat</label></td><td><input type="text" name="etat_match" value="<?php echo $infos['etat'];?>" class="form-control"></td></tr>
		  </table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_matchs.php" >Annuler</button></p>
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
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Match</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant du match</label></td><td><input type="text" name="id_match" class="form-control"></td></tr>
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

