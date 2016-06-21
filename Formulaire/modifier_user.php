<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsUser($bdd,$id_user){
		$req=$bdd->prepare('select * from Users where id=:n1');
		$req->execute(array(
			':n1'=>$id_user
		));
		return $req->fetch();
	}

if(isset($_GET['id_user']) or !empty($_GET['id_user'])){

	$user=recuperInformationsUser($bdd,$_GET['id_user']);
	if(isset($_POST['login']) and !empty($_POST['login'])){
			$id_user=$_GET['id_user'];
			$login=$_POST['login'];
			$nom=$_POST['nom'];
			$profil=$_POST['profil'];
			$etat=$_POST['etat'];
			$mdp=sha1($_POST['mdp']);
			$requete=$bdd->query("Update Users SET login='$login',nom='$nom',profil='$profil',etat='$etat',mdp='$mdp' where id=$id_user");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>Modifiée avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_users.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion User</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		  <table>
			<tr><td><label>Login </label></td><td><input type="text" name="login" value="<?php echo $user['login'];?>" class="form-control"></td></tr>
			<tr><td><label>Nom </label></td><td><input type="text" name="nom" value="<?php echo $user['nom'];?>" class="form-control"></td></tr>
			<tr><td><label>Profil </label></td><td><select name="profil" class="form-control">
				<option selected><?php echo $user['profil'];?></option>
				<option value="Challenge">Challenge</option>
				<option value="Photographe">Club Photo</option>
				<option value="Administrateur">Administrateur</option>
			</select>
			</td></tr>
			<tr><td><label>Mot de passe (un nouveau mdp est requis)</label></td><td><input type="password" name="mdp" required class="form-control"></td></tr>
			<tr><td><label>Etat </label></td><td><input type="text" name="etat" value="<?php echo $user['etat'];?>" class="form-control"></td></tr>
		  </table><br/><br/><br/>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_faqs.php" >Annuler</button></p>
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
                <h2><i class="glyphicon glyphicon-info-edit"></i> Modification Faq</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="" method='get'>
				<table>
					<tr><td><label>l'identifiant FAQ</label></td><td><input type="text" name="id_user" class="form-control"></td></tr>
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

