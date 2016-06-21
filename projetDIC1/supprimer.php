<?php
require("head.php");
require("verification.php");
////////////////////////////////// Supprimer ///////////////////////////////



//$nom=strtolower($_POST['nom']);
$id=$_GET['id'];
if(isset($id)){
	
$req = "select * from dic_citoyen where cty_id= :id ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("id"=>$id));
include ("menu.php");
	// On affiche chaque entrée une à une
	if ($donnees = $reponse->fetch())
	{
		$id=$donnees['cty_id'];
		$immatricul=$donnees['cty_immatricul'];
		$prenom=$donnees['cty_prenom'];
		$nom=$donnees['cty_nom'];
		$datenaiss=$donnees['cty_datenaissance'];
		$lieunaiss=$donnees['cty_lieunaissance'];
		$cni=$donnees['cty_nci'];
		$datecnideliv=$donnees['cty_datecnidelivre'];
		$datecniexpire=$donnees['cty_datecniexpire'];
		$sexe=$donnees['cty_sexe'];
		$profession=$donnees['cty_profession'];
		$specialite=$donnees['cty_specialite'];
		$dateentre=$donnees['cty_dateentre'];
		$teint=$donnees['cty_teint'];
		$taille=$donnees['cty_taille'];
		$photo=$donnees['cty_photo'];
		/*********** récperation des coordonnees*************/
		$req2 = "select * from contacts where cty_contact_cni= :cni ";
		$reponse2 = $bdd->prepare($req2);
		$reponse2->execute(array("cni"=>$cni));
		if($donnees2 = $reponse2->fetch()){
			$tel=$donnees2['cty_telephone'];
			$email=$donnees2['cty_email'];
			$telGondwana=$donnees2['cty_telGondwana'];
			$adresseGondwana=$donnees2['cty_adresseGondwana'];
			$telSenegal=$donnees2['cty_telSenegal'];
			$adresseSenegal=$donnees2['cty_adresse'];
			$adresseTravail=$donnees2['cty_adresseTravail'];
			$adresseDomicile=$donnees2['cty_adresseDomicile'];
		}
		/*************** recuperations informations familiales ***************/
		$req3 = "select * from parents where cty_cniparent= :cni ";
		$reponse3 = $bdd->prepare($req3);
		$reponse3->execute(array("cni"=>$cni));
		if($donnees3 = $reponse3->fetch()){
			$prenomPere=$donnees3['cty_prenomPere'];
			$prenomMere=$donnees3['cty_prenomMere'];
			$nomMere=$donnees3['cty_nomMere'];
			$prenomConjoint=$donnees3['cty_prenomConjoint'];
			$nomConjoint=$donnees3['cty_nomConjoint'];
			$photoConjoint=$donnees3['cty_scanphoto'];
		}
	}

$cheminphoto_cty="./photo/$photo";
$cheminphoto_conjoint="./photo/$photoConjoint";
}

	$bdd->exec("delete from dic_citoyen where cty_id='".$id."'");
	$bdd->exec("delete from contacts where cty_contact_cni='".$cni."'");
	$bdd->exec("delete from parents where cty_cniparent='".$cni."'");

	$cmd1="rm /var/www/html/projetDIC1/$cheminphoto_cty";
	$cmd2="rm /var/www/html/projetDIC1/$cheminphoto_conjoint";
	exec($cmd1);
	exec($cmd2);

?>




<script language="JavaScript">
		alert("Citoyen supprimé avec succes");
		window.location.replace("body.php");// On inclut le formulaire d'identification
		</script>


