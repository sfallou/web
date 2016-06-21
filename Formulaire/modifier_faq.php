<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

function recuperInformationsFaq($bdd,$id_faq){
		$req=$bdd->prepare('select * from Faq where id_question=:n1');
		$req->execute(array(
			':n1'=>$id_faq
		));
		return $req->fetch();
	}

if(isset($_GET['id_faq']) or !empty($_GET['id_faq'])){

	$faq=recuperInformationsFaq($bdd,$_GET['id_faq']);
	if(isset($_POST['titre']) and !empty($_POST['titre'])){
			$id_faq=$_GET['id_faq'];
			$titre=$_POST['titre'];
			$question=$_POST['question'];
			$reponse=$_POST['reponse'];
			$requete=$bdd->query("Update Faq SET question='$question',reponse='$reponse',titre='$titre' where id_question=$id_faq");
		$msg='<strong>erreur!</strong>vous avez fait une erreur dans la saisie ';
		
		?>
		<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>Modifiée avec succes.
		</div>
			<p class="center col-md-5">
					<a class="btn btn-default" href="liste_faqs.php" >Retour</button>
				</p>
		<?php 
		} 
	else {
	?>
	<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Modificaion FAQ</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		  <table>
			<tr><td><label>Thème </label></td><td><input type="text" name="titre" value="<?php echo $faq['titre'];?>" class="form-control"></td></tr>
			<tr><td><label>Question </label></td><td><textarea name="question"  class="form-control"><?php echo $faq['question'];?></textarea></td></tr>
			<tr><td><label>Réponse </label></td><td><textarea name="reponse"  class="form-control"><?php echo $faq['reponse'];?></textarea></td></tr>
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
					<tr><td><label>l'identifiant FAQ</label></td><td><input type="text" name="id_faq" class="form-control"></td></tr>
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

