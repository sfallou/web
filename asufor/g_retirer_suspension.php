
		<?php
		require("head.php");
		?>
		<?php
	
	//récupération des informations 
	$id_abonne=$_POST['id_abonne'];
	
		//on change l'état de la facture
		$requete1 = "UPDATE compteur SET etat = 0 WHERE id = $id_abonne";
		$resultat1= mysql_query($requete1);
		// on cchange l'etat de l'abonné 	
		$requete2 = "UPDATE abonne SET etat = 0 WHERE id_abonne = $id_abonne";
		$resultat2= mysql_query($requete2);
		
	?>
	<script language="JavaScript">
		alert("Modification effectuée avec succès!!");
		window.location.replace("g_historique.php");// On inclut le formulaire d'identification
	</script>
	