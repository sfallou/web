
<?php
	
	require_once ('connexion_bd.php');
    require_once ('classes/Statistique.php' );

    $objet= new Statistique(0,0);

	//=====......récupération des informations......==========

	$id_abonne=$_POST['id_abonne'];
	$id_compter=$_POST['id_compteur'];
	
	//====....on verifie si l'abonné avait une dette non payée ou pas...=======

	$req=$bdd->prepare("SELECT * FROM dette WHERE id_abonne= :id_abonne ");
	$req->execute(array(':id_abonne' =>$id_abonne ));

	while($donnee=$req->fetch() )
		{
		$montant_dette=$donnee['montant_dette']; 
		$num_facture=$donnee['num_facture'];
		$date_dette=$donnee['date_dette'];
		}

	//===......si montant_dette=0 on accepte le paiement de la facture...======

	if($montant_dette==0)
		{	
		//===.....on change l'état de la facture...=====

		$objet->changeEtatFact1($bdd,$id_compteur);

		//====....on change l'etat de l'abonné...=====

		$objet->changeEtatAbonne1($bdd,$id_abonne);


		//===.... on le redrige vers la page d'alerte OK.php.....====
		?>
		<script language="JavaScript">
		alert("Modification effectuée avec succès!!");
		window.location.replace("statistique.php");// On inclut le formulaire d'identification
	</script>
	<?php
		}
	else if(montant_dette!=0)
		{
		echo"<h2>Paiement Impossible !</h2>
			<p>Désolé! Cet abonné doit d'abord payer sa dette sur la facture N°$num_facture du $date_dette <br/>
			Le montant de cette dette est de : $montant_dette FCFA.<br/>
			</p><br/><a href='statistique.php'>Retourner</a>";
		}
	
	?>
	
