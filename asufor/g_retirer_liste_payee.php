
		<?php
		require("head.php");
		?>
	
		<?php
	//r�cup�ration des informations 
	$id_abonne=$_POST['id_abonne'];
	
		//on change l'�tat de la facture
		$requete1 = "UPDATE compteur SET etat = 0 WHERE id = $id_abonne";
		$resultat1= mysql_query($requete1);
		// on cchange l'etat de l'abonn� 	
		$requete2 = "UPDATE abonne SET etat = 0 WHERE id_abonne = $id_abonne";
		$resultat2= mysql_query($requete2);
	
	?>
<script language="JavaScript">
		alert("Modification effectu�e avec succ�s!!");
		window.location.replace("g_historique.php");// On inclut le formulaire d'identification
	</script>