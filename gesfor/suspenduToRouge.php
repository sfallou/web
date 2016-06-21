<?php
session_start();
require('secure.php');
require('connexion.php'); 
require('classes/utilisateurs.php');
 if(isset($_GET['id_abonne']) and !empty($_GET['id_abonne']) and isset($_GET['id_compteur']) and !empty($_GET['id_compteur'])){
		$abn=new abonne($_GET['id_abonne']);
		$cpteur=new Compteur($bdd,$_GET['id_abonne']);
		$finance=new Finance($bdd);
		/*************************************/

		//on change l'état de la facture
		$cpteur->changerEtatCompteur($_GET['id_compteur'],0);
		// on change l'etat de l'abonné 
		$abn->changerEtat($bdd, 0);
		//on le redrige vers la gestion des listes.php
		?>
		<script language="JavaScript">
		alert("Suspension retiree avec succes!!");
		window.location.replace("etat_facturation.php");
	</script>
	<?php
	}
	?>

	