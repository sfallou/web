<?php
require("head.php");
?>
	
		<?php
	//r�cup�ration des informations 
	$id_abonne=$_POST['id_abonne'];
	$id_compteur=$_POST['id_compteur'];
		//on change l'�tat de la facture
		$requete1 = "UPDATE compteur SET etat = 2 WHERE id_compteur = $id_compteur";
		$resultat1= mysql_query($requete1);
		// on cchange l'etat de l'abonn� 	
		$requete2 = "UPDATE abonne SET etat = 2 WHERE id_abonne = $id_abonne";
		$resultat2= mysql_query($requete2);
		//on le redrige vers la page d'alerte OK.php
	
	?>
	<script language="JavaScript">
		alert("Modification effectu�e avec succ�s!!");
		window.location.replace("gestion_facture.php");// On inclut le formulaire d'identification
	</script>