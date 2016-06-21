<?php
session_start();
require('secure.php');
require('header.php');
include('connexion.php');

?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouveau Match</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
<?php
if((isset($_POST['sport']) or !empty($_POST['sport'])) and (isset($_POST['sexe']) or !empty($_POST['sexe']))){
	$sport=$_POST['sport'];
	$sexe=$_POST['sexe'];
	?>
	 <center>
	<form action="traitementMatchsSpecial.php" method="POST" enctype="multipart/form-data">
	<h3 style="text-align:center">Entrez les paramètres du match</h3>
	</br>
	<label> Nom de l'équipe (ou du joueur) :
		<select name="equipe">
    		<option value="rien">Sélectionner une équipe (ou un joueur)</option>
    		<?php
			 $sql=$bdd->query("select * from Equipes where type_sport='$sport' and type_equipe='$sexe'");
    		while ($data=$sql->fetch()) {
    		//$id=$data['id_equipe'];
    		$nom_e1=$data['nom_equipe'];
    		?>
            <option value="<?php echo $nom_e1;?>"><?php echo "$nom_e1";?></option>
           	<?php
           	}
  			?>
    	</select>
    </label></br></br>
 	</div>
 	<center>
 		<input type="hidden" name="sport" value="<?php echo $sport;?>">
 		<button class="btn btn-primary" type="submit">Créer le match</button>
 	</form>
 	</center>
	<?php
		} 
	else {
	?>
		<center>
		<form role='form' action="" method='post' enctype="multipart/form-data">
		 <label>Sport concerné : <select name="sport">
						 <option> Athletisme
						 <option> Badminton
						 <option> Escalade
						 <option> Escrime
						 <option> Golf
						 <option> Judo
						 <option> Natation
						 <option> Raid
						 <option> Ski
						 <option> Tennis
						 <option> Tennis de table
						 <option> Ultimate
						 <option> Waterpolo
						 </select>
		</label></br></br>

		 <label>Genre concerné : <select name="sexe">
						 <option> Homme
						 <option> Femme
						 <option> Mixte
					 </select>
		 </label></br></br>
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Chercher</button>&nbsp;&nbsp;<a class="btn btn-default" href="liste_faqs.php" >Annuler</button></p>
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
