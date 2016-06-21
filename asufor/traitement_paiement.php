
		<?php
		require("head.php");
		?>
		<?php
	
	//récupération des informations 
	$id_abonne=$_POST['id_abonne'];
	$id_compter=$_POST['id_compteur'];
	
	//on verifie si l'abonné avait une dette non payée ou pas
	$requete="SELECT * FROM dette WHERE id_abonne=$id_abonne";
	$resultat=mysql_query($requete);
	while($donnee=mysql_fetch_array($resultat))
		{
		$montant_dette=$donnee['montant_dette']; // on recupére le montant de la dette
		$num_facture=$donnee['num_facture'];
		$date_dette=$donnee['date_dette'];
		}

	//si montant_dette=0 on accepte le paiement de la facture
	if($montant_dette==0)
		{	
		//on change l'état de la facture
		$requete1 = "UPDATE compteur SET etat = 1 WHERE id_compteur = $id_compteur";
		$resultat1= mysql_query($requete1);
		// on change l'etat de l'abonné 	
		$requete2 = "UPDATE abonne SET etat = 1 WHERE id_abonne = $id_abonne";
		$resultat2= mysql_query($requete2);
		//on le redrige vers la page d'alerte OK.php
		?>
		<script language="JavaScript">
		alert("Modification effectuée avec succès!!");
		window.location.replace("historique.php");// On inclut le formulaire d'identification
	</script>
	<?php
		}
	else if(montant_dette!=0)
		{
		echo"<h2>Paiement Impossible !</h2>
			<p>Désolé! Cet abonné doit d'abord payer sa dette sur la facture N°$num_facture du $date_dette <br/>
			Le montant de cette dette est de : $montant_dette FCFA.<br/>
			</p><br/><a href='historique.php'>Retourner</a>";
		}
	
	?>
	
