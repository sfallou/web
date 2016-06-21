<?php
ini_set("display_errors",0);error_reporting(0);
require("connexion_bd.php");
include("variables.php");
$id_abonne=$_POST["id_abonne"];
$id_compteur=$_POST["id_compteur"];
$prenom=$_POST["prenom"];
$nom=$_POST["nom"];
$adresse=$_POST["adresse"];
$date=$_POST["date"];
$ancien_index=$_POST["ancien_index"];
$nouvel_index=$_POST["nouvel_index"];
$periode=$_POST["periode"];
$diff=$_POST["diff"];
$tarif=$_POST["tarif"];
$montant=$_POST["montant"];
$dette=$_POST["dette"];
$date_expiration=$_POST["date_expiration"];

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
            <td style="width: 20% ">
                <table cellspacing="0" style="width: 50%; text-align: left; ">
                    <tr>
                        <td style="width: 100%; font-size: 12pt;">
                            <span style="font-size: 12pt; font-weight: bold;"><?php entete_asufor()?><br></span>
                        </td>
                    </tr>
                </table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellspacing="0" style="width: 100%; text-align:center; ">
					<tr>
						<td style="width: 100%; font-size: 15pt;">
							<span style="font-size: 15pt; font-weight: bold;">BON DE COUPURE<br/><br/></span>
                        </td>
                    </tr>
                </table>
			</td>
        </tr>
		<tr>
			<td style="width: 47% ">
                <table cellspacing="0" style="width: 100%;  font-size: 12pt; text-align:left;">
                    <tr><td style="width: 40%;"><?php echo "Numero facture impayee: $id_compteur";?></td><td style="width: 20%;"></td><td style="width: 40%;"><?php echo "Prenom: $prenom";?></td></tr>
                    <tr><td style="width: 40%;"><?php echo "Date: $date";?></td><td style="width: 20%;"></td><td style="width: 40%;"><?php echo "Nom: $nom";?></td></tr>
                    <tr><td style="width: 40%;"><?php echo "ID Abonne: $id_abonne";?></td><td style="width: 20%;"></td><td style="width: 40%;"><?php echo "Adresse: $adresse";?></td></tr>
                 </table><br/><br/>
                <table cellspacing="0" style="width: 100%; font-size: 12pt;" >
                    <tr><td>Pour cause de retard de paiement de votre facture d'eau du <?php echo $date; ?>, on vous informe qe votre compteur a ete coupe jusqu'a ce que vous vous acquittez de vos droits</td>
                    </tr>
                </table>
                <br>
				<table cellspacing="0" style="padding: 1px; width: 100%; border: solid 2px #000000; font-size: 11pt; ">
                    <tr>
                        <th style="width: 100%; text-align: center; border: solid 1px #000000;" colspan="7">
                            Détails de la facture coupee
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 6%; border: solid 1px #000000;" >An-index</th>
						<th style="width: 6%; border: solid 1px #000000;">Nv-index</th>
						<th style="width: 8%; border: solid 1px #000000;">Consommation d'eau(m3)</th>
						<th style="width: 8%; border: solid 1px #000000;">Tarif(FCFA/m3)</th>
						<th style="width: 12%; border: solid 1px #000000;">Montant Consommation(CFA)</th>
						<th style="width: 8%; border: solid 1px #000000;">Frais Coupure(FCA)</th>
                    </tr>
					<tr>
						<td style="width: 8%; border: solid 1px #000000;" > <?php echo $ancien_index; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"> <?php echo $nouvel_index; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"><?php echo $diff; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"><?php echo $tarif; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"> <?php echo $montant;?></td>
						<td style="width: 8%; border: solid 1px #000000;"><?php echo "3000";?></td>
					</tr>
					<tr>
						<td style="width: 8%; border: solid 1px #000000;" colspan="4" ><strong>NET A PAYER</strong></td>
						<td style="width: 8%; border: solid 1px #000000;" colspan="2" ><?php echo $montant+3000; ?> FCFA</td>
					</tr>
                </table>
            </td>
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
