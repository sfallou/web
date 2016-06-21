<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
	include('classes/utilisateurs.php');
/** récuperation des informations**/
	$cni=$_POST['cni'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$tel=$_POST['tel'];
	$adresse=$_POST['adresse'];
	$ancien_index=$_POST['index'];
	$date=$_POST['date_abonnement'];
	$frais=$_POST['frais'];
	if($adresse=='village_special')
		$special=1;
	else 
		$special=0;

	if($_SESSION['statut']=='administrateur'){

		abonne::ajouterAbonneAdmin($bdd, $cni, $nom, $prenom, $adresse, $tel, $date,$frais);
		$comp=new Compteur($bdd, abonne::getIdAbonne($bdd, $nom, $prenom, $cni, $adresse));
		$comp->nouveauCompteur($ancien_index,$ancien_index,$date,$special);
					
		?>
	<script language="JavaScript">
		alert("Enregistrement effectué avec succès!!");
		window.location.replace("bon_abonnement.php");
		</script>
		
    <?php 

	}
	else{
		abonne::ajouterAbonneGerant($bdd, $cni, $nom, $prenom, $adresse, $tel, $date,$ancien_index,$frais);
	?>
	<script language="JavaScript">
		alert("Enregistrement effectué avec succès!! Il sera validé par l'administrateur");
		window.location.replace("nouveauabonne.php");
		</script>
     <?php
 }
?>