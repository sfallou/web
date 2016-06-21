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
<?php


/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
?>
<page>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
     	<tr>
			<td>
				<table cellspacing="0" style="width: 100%; text-align:center; ">
					<tr>
						<td style="width: 100%; font-size: 15pt;">
							<span style="font-size: 15pt; font-weight: bold;"><h1>CARTE CONSULAIRE</h1><h2>HAUT COMMISSARIAT DU SENEGAL<br/> AU GONDWANA</h2>
							<h5>Immatriculation N°: <?php echo$immatricul;?></h5><br/><br/></span>
                        </td>
                    </tr>
                </table>
			</td>
        </tr>
		<tr>
			<td style="width: 80% ">
                <table cellspacing="10" style="width: 100%;  font-size: 12pt; text-align:left;">
                    <tr>
                    <td style="width: 40%;" ><?php echo "Prenom: $nom";?>
                    	<br/><?php echo "Nom: $prenom";?>
           				<br/><?php echo "Né le $datenaiss";?>
           				<br/><?php echo "à $lieunaiss";?>
           				<br/><?php echo "de $prenomPere";?>
           				<br/><?php echo "et de $prenomMere $nomMere";?>
           				<br/><?php echo "N°CNI/Passport: $cni";?>
           				<br/><?php echo "Profession: $profession";?>
           				<br/><?php echo "Adresse $adresseDomicile";?>
           				<br/>
           				<br/><?php echo "Signalement";?>
                    </td>
                    <td style="width: 40%;" valign="middle">
                    	<br/><?php echo "Teint: $teint";?>
           				<br/><?php echo "Taille: $taille";?>
           				<br/><?php echo "Fait le $dateimmatr";?>
                    </td>
                    <td  align="left" valign="top">&nbsp;&nbsp;<img src="<?php echo $cheminphoto_cty;?>" alt="lui" height="100" width="100"/><br/>
                    	<br/><br/><br/>Timbre
                    </td>
                   </tr>
                   <tr><td>Valable jusqu'au <?php echo "$datecniexpire";?><br/>Emprunt index gauche<br><img src="images/index.png" alt="lui" height="100" width="120"/></td><td>Signature du titulaire</td><td>L'ambassadeur<br/>Haut Commissaire</td></tr>
                 	
                 </table><br/><br/>
                
                <br>
				
            </td>
		</tr>
    </table>
</page>

<page>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
		       <tr>
                   	<td align="left"><img src="images/drapeauSenegal.png"/></td>
                   </tr>
                   <tr>
                 		<td  align="center">
                 			<h1><u>Certificat d'immatriculation</u>	</h1>
                 		Je soussigné Monsieur l'Ambassadeur et Haut Commissaire du Sénégal en Gondwana,<br/>atteste que 
						<?php echo "<strong>Madame/Monsieur $nom $prenom </strong>né le <strong>$datenaiss à $lieunaiss</strong> a été immatriculé au <br/>
					registre des sénégalais vivant au Gondwana le <strong>$dateimmatr sous le numéro $immatricul</strong>. En<br/>
					foi de quoi ce certificat lui est délivré pour servir et valoir ce que de droit.";?><br/><br/>
					<pre>                                  L'Ambassadeur <br/>
				     Haut Commissaire </pre>
					</td>
				</tr>
   			 </table><br/><br/>
   			 <table>
		<tr>
			<td><h1>CHANGEMENT D'ADRESSE</h1><h1>DANS LA CISCONSCRIPTION</h1>
              <br/><br/>Visas par le chef de Mission<br><br>
              <br>******************************************<br/><br>
              <br>******************************************<br/><br>
              <br>******************************************<br/><br>
              NOTE<br><br>
              Cette carte doit être obligatoirement<br/>
              rendue en cas de départ définitif
			</td>
			<td valign="top"><img src="images/drapeauSenegal.png"/><br/><br/><br/>
				-------------------------------------------------------------------<br/><br/>
				<h1>CARTE<br/>D'IDENTITE<br/>CONSULAIRE</h1></td>
		</tr>
	</table>

</page>
<?php
     $content = ob_get_clean();

    // convert to PDF
   require_once('html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 10);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('facture.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>