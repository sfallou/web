<?php
ini_set("display_errors",0);error_reporting(0);
require("connexion_bd.php");
include("variables.php");
include("changer_format_date.php");
$id_abonne=$_POST["id_abonne"];
//$id_compteur=$_POST["id_compteur"];
$prenom=$_POST["prenom"];
$nom=$_POST["nom"];
$adresse=$_POST["adresse"];
$date_abonnement=$_POST["date_abonnement"];
$cin=$_POST["cin"];
$telephone=$_POST["telephone"];
$frais_abonnement=$_POST["frais_abonnement"];
$date_abonnement=changedate1($date_abonnement);


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
<div style="width:700px ;background-color:white;border: 1px ;dashed ;solid #000;border-radius:20px; text-align:center">
<h4><?php entete_asufor()?></h4>
	<h5 style="font-family: Arial;color:black ;font-weight: 100; font-size: 20px; text-align:center;">Bon d'abonnement</h5><br/>
			<table cellspacing="20px" align="center">
				<tr><th >Prenom:</th><td><?php echo $prenom;?></td> <th>Nom:</th><td><?php echo $nom;?></td> <th>Identifiant:</th><td> <?php echo $id_abonne;?></td></tr>
				<tr><th>Adresse:</th><td><?php echo $adresse;?></td>  <th>CNI:</th><td><?php echo $cin;?></td> <th> Telephone:</th><td><?php echo $telephone;?> </td></tr>
				<tr><th >Frais :</th><td><?php echo $frais_abonnement ;?>FCFA</td>  <th colspan="2">Date & lieu d'abonnement:</th><td colspan="2">SEOKHAYE le <?php echo $date_abonnement;?></td></tr><br/>
		    </table>
			<p class="paragrahe">
			Votre abonnement a ete enregistre avec succes dans le Reseau ASUFOR de SEOKHAYE<br/>
			Dorenavant,de l'eau potable vous sera servi dans les meilleurs conditions.<br/>
			"VOTRE SATISFACTION! NOTRE AMBITION!"
			</p>
</div>
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
        $html2pdf->Output('abonnement.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
