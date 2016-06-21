<?php
require('connexion.php'); 
require('classes/utilisateurs.php');
 if(isset($_GET['id_abonne']) and !empty($_GET['id_abonne']) and isset($_GET['id_compteur']) and !empty($_GET['id_compteur'])){
		$abn=new abonne($_GET['id_abonne']);
		$cpteur=new Compteur($bdd,$_GET['id_abonne']);
		$finance=new Finance($bdd);
		/*************************************/

		//on verifie si l'abonné avait une dette non payée ou pas
		$dette=$finance->getInfoDette($_GET['id_abonne']);
		//si montant_dette=0 on accepte le paiement de la facture
	if($dette['montant_dette']==0){
		//on change l'état de la facture
		$cpteur->changerEtatCompteur($_GET['id_compteur'],1);
		// on change l'etat de l'abonné 
		$abn->changerEtat($bdd, 1);
		//on le redrige vers la gestion des listes.php
		?>
		<script language="JavaScript">
		alert("Paiement effectuee avec succes!!");
		window.location.replace("etat_facturation.php");
	</script>
	<?php
		}
	else if($dette['montant_dette']!=0)
		{
		?>
		<script language="JavaScript">
		alert("Echec!!! Paiement Impossible le client a une dette non payee!!");
		window.location.replace("etat_facturation.php");
	</script>
	<?php
		}
	}
	?>

	