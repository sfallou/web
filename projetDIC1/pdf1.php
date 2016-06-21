<?php
require("connexion.php");
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
		$dateimmatr=$donnees['cty_dateimmatricul'];
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

<page backtop="10%" backbottom="5%" backleft="10%" backright="20%">

		<table style="width:100%;cellspacing:10px">
				<tr align="center">
					<td colspan="3"  style="align:center;width:100%">

							<Strong><big>&nbsp;	&nbsp;CARTE CONSULAIRE</big></Strong>
							<br/> HAUTE COMMISSARIAT DU SENEGAL <br/>
							AU GONDWANA <br/>
								
					</td>
				</tr>
				<tr align="right" >  
					<td width="95%"> 
					   <Strong>
					       N°: <?php echo $immatricul?>
					    </Strong> 
					 </td>

					
				</tr>

				<tr>

					<td colspan="3" width="80%">
						Nom : 				<Strong>    <?php echo $nom;?>		</Strong><br/>				
					    Prenom :			<Strong> 	<?php echo $prenom;?>			</Strong><br/>
					    N&eacute;(e) le : 	<Strong>	<?php echo $datenaiss;?>	</Strong><br/>
					    &agrave; : 			<Strong>	<?php echo $lieunaiss;?>	</Strong><br/>
					    de : 				<Strong>	<?php echo $prenomPere;?>			</Strong><br/>
					    et de :				<Strong>	<?php echo $prenomMere;?>									</Strong><br/>
					    CNI/Passport:		<Strong>	<?php echo $cni;?>			</Strong><br/>
					    Profession :		<Strong>	<?php echo $profession;?>		</Strong><br/>
					    Adresse : 			<Strong> 	<?php echo $adresseGondwana;?>									 </Strong><br/><br/><br/>	
					    
					</td>
					<td rowspan="1" colspan="3" width="20%" >
					    <img src="<?php echo $cheminphoto_cty;?>" alt="lui" height="100" width="100" /><br/><br/><br/>
					</td>		
					
				</tr>
				<tr>
					<td colspan="2">Signalement <br /><label></label></td>
					<td >
							  Teint   :	<label><Strong>   <?php echo $teint;?>		   </Strong></label><br />
							  Taille  :	<label><Strong>   <?php echo $taille;?>		    </Strong></label><br />
							  Fait le : <label><Strong>   <?php echo $dateimmatr;?>	 </Strong></label><br />
					</td>
					<td>Timbre <br/><br/><br/><br/><br/></td>
				</tr>
				<tr>
					<td>
						Valable jusqu'au :   <label><?php echo $datecniexpire;?></label><br />
						Emprunt index Gauche <br /><br />
						------------------|<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		   |<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		   |<br />
					</td>

					<td colspan="2"><label>Signature du titulaire</label></td>
					<td > <label>L'Ambassade<br />Haut commissaire</label></td>
				</tr>
				
			</table>

		<!-- ==============Ceci  Conserne la deuxieme partie  de la carte consulaire====================== -->

			<table>
			   <tr>
				<td>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/drapeauSenegal.png" alt="senegal" height="50" width="100" /><br />
				</td>
			  </tr>
			  <tr align="center">
				<td colspan="4" width="100%">		  	
			  		<Strong><u>Certificat d'immatriculation <br /><br/></u></Strong>	
				</td>
			  </tr>
			  <tr>
			  	<td colspan="4">
			  	 
				  Je soussign&eacute; Monsieur l'Ambassadeur et Haut Commissaire du S&eacute;n&eacute;gal en Gondwana,<br />
				  atteste que Monsieur <?php echo "$prenom $nom";?> n&eacute; le <?php echo $datenaiss?> &agrave; <?php echo $lieunaiss;?> a 
			      &eacute;t&eacute; immatricul&eacute; au
				  registre des S&eacute;n&eacute;galais vivant au Gondwana le <?php echo $dateimmatr;?> sous le num&eacute;ro
				  <?php echo $immatricul?>. En foi de quoi ce certificat lui est d&eacute;livr&eacute; pour servir et valoir ce que de droit<br /><br />

			  	</td>
			  	
			  </tr>
			  <tr align="right">
			  	<td width="100%">
			  		<Strong>
			  			L'Ambassadeur <br />
			  			Haut Commissaire
			  		</Strong>
			  	</td>
			  </tr>
	        </table>	

</page>

<?php


?>