<?php
$id=$_GET['id'];
if(isset($id)){
	
$req = "select * from dic_citoyen where cty_id= :id ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("id"=>$id));
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
list($datenaiss,$a)=explode(" ", $datenaiss);
?>
	<center><h1> <img src="images/drapeau.jpg" width="50px"/>  CONSULAT  <img src="images/drapeau.jpg" width="50px"/> <h1><h2>HAUT COMMISSARIAT DU SENEGAL<br/> AU GONDWANA</h1>
		<h5>Immatriculation N°: <?php echo$immatricul;?></h5>
	</center>
	<table width="900" cellspacing="50px"> 
		<tr>
			<td>Prenom:<strong> <?php echo  $prenom?></strong><br/>
				Nom:<strong> <?php echo  $nom?></strong><br/>
				Date de naissance:<strong> <?php echo  $datenaiss?></strong><br/>
				Lieu de naissance:<strong> <?php echo  $lieunaiss?></strong><br/>
				N°CNI/Passport:<strong> <?php echo  $cni?></strong><br/>
				Date delivrance:<strong> <?php echo  $datecnideliv?></strong><br/>
				Date expiration:<strong> <?php echo  $datecniexpire?></strong><br/>
				Sexe:<strong> <?php echo $sexe?></strong><br/>
				Profession:<strong> <?php echo $profession?></strong><br/>
				Specialite:<strong> <?php echo $specialite?></strong><br/>
				Date d'entrée au Gondwana:<strong> <?php echo $dateentre?></strong><br/>
				Teint:<strong> <?php echo $teint?></strong><br/>
				Taille:<strong> <?php echo $taille?>m</strong><br/>
				<center>................................ Coordonnées..........................</center>
				Téléphone:<strong> <?php echo $tel?></strong><br/>
				Email:<strong> <?php echo $email?></strong><br/>
				Téléphone Gondwana<strong> <?php echo $telGondwana?></strong><br/>
				Adresse Gondwana:<strong> <?php echo $adresseGondwana?></strong><br/>
				Téléphone Sénégal:<strong> <?php echo $telSenegal?></strong><br/>
				Adresse Sénégal:<strong> <?php echo $adresseSenegal?></strong><br/>
				Adresse Domicile:<strong> <?php echo $adresseDomicile?></strong><br/>
				Adresse Travail:<strong> <?php echo $adresseTravail?></strong><br/>				
			</td>
			<td valign="top"><img src="<?php echo$cheminphoto_cty;?>" width="150px" height="150px"/><br/><br/><br/><br/>
				............ Filiations.........<br/>
				Prénom du père:<strong> <?php echo $prenomPere?></strong><br/>
				Prénom de la mère:<strong> <?php echo $prenomMere?></strong><br/>
				Nom de la mère:<strong> <?php echo $nomMere?></strong><br/>
				Prénom Conjoint(e):<strong> <?php echo $prenomConjoint?></strong><br/>
				Nom Conjoint(e):<strong> <?php echo $nomConjoint?></strong><br/>
				Photo Conjoint(e):<br/><img src="<?php echo$cheminphoto_conjoint;?>" width="150px" height="150px"/><br/>
			</td>
		</tr>
	</table>
