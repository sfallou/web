

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
	<form action="traitementMatchs.php" method="POST" enctype="multipart/form-data">
	<h3 style="text-align:center">Entrez les paramètres du match</h3>
	</br>

	<label> Équipe 1 :
		<select name="equipe1">
    		<option value="---">Sélectionner une équipe</option>
    		<?php
    		$sql=$bdd->query("select * from Equipes where type_sport='$sport' and type_equipe='$sexe'");
            while ($data=$sql->fetch()) {
            	$nom_e1=$data['nom_equipe'];
            ?>
            <option value="<?php echo $nom_e1;?>"><?php echo "$nom_e1";?></option>
           	<?php
           	}
  			?>
  			<option value="---">----</option>
    	</select>
    </label>
	</br><br>
	<label> Équipe 2 :
		<select name="equipe2">
    		<option value="---">Sélectionner une équipe</option>
    		<?php
    		$sql=$bdd->query("select * from Equipes where type_sport='$sport' and type_equipe='$sexe'");
            while ($data=$sql->fetch()) {
            	$nom_e2=$data['nom_equipe'];
            ?>
            <option value="<?php echo $nom_e2;?>"><?php echo "$nom_e2";?></option>
           	<?php
           	}
  			?>
  			<option value="---">----</option>
    	</select>
    </label>
	</br>
	<label>Score 1 : <input name="score1" value="0" style="width:50px" required></label>
	</br></br>
	<label>Score 2 : <input name="score2" value="0" style="width:50px" required></label>
	</br></br>
 	<label>Phase : <select name="phase">
	 	<option> Poule
	 	<option> Barrage
	 	<option> Huitieme_finale
	 	<option> Quart_finale
	 	<option> Demie_finale
	 	<option> Petite_finale
	 	<option> Finale
	 </select>
	</label>
	</br></br>
 	<label>Numéro de poule : <select name="poule">
	 	<option> 0
	 	<option> 1
	 	<option> 2
	 	<option> 3
	 	<option> 4
	 	<option> 5
	 	<option> 6
	 	<option> 7
		<option> 8
	 	<option> 9
	 	<option> 10
	 	<option> 11
	 	<option> 12
	 	<option> 13
	 	<option> 14
	 	<option> 15
		<option> 16
	 </select>
	</label>
	</br></br>
	<label>Date : <input type="text" name="date" placeholder="Samedi 19 Mars" required>
	</label>
	</br></br>
	<label>Heure : <input name="heure" style="width:50px" placeholder="10:30" required></label>
	</br></br>
	<label>Lieu : <select name="lieu">
		<option> Ecully
		<option> Doua
		<option> Centrale Lyon
	</select>
	</label>
	</br></br>
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
						 <option> Basketball
						 <option> Football
						 <option> Handball
						 <option> Rugby
						 <option> Volley
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

