<?php
ini_set("display_errors",0);error_reporting(0);
require("connexion.php");
include("variables.php");


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
<?php
foreach($_POST['id_abonne'] as $i=>$abonne) {

$id_abonne=$_POST["id_abonne"][$i];
$id_compteur=$_POST["id_compteur"][$i];
$prenom=$_POST["prenom"][$i];
$nom=$_POST["nom"][$i];
$adresse=$_POST["adresse"][$i];
$date=$_POST["date"][$i];
$ancien_index=$_POST["ancien_index"][$i];
$nouvel_index=$_POST["nouvel_index"][$i];
$periode=$_POST["periode"][$i];
$diff=$_POST["diff"][$i];
$tarif=$_POST["tarif"][$i];
$montant=$_POST["montant"][$i];
$dette=$_POST["dette"][$i];
$date_expiration=$_POST["date_expiration"][$i];
?>
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
							<span style="font-size: 15pt; font-weight: bold;">FACTURE D'EAU<br/><br/></span>
                        </td>
                    </tr>
                </table>
			</td>
        </tr>
		<tr>
			<td style="width: 47% ">
                <table cellspacing="0" style="width: 100%;  font-size: 12pt; text-align:left;">
                    <tr><td style="width: 40%;"><?php echo "Numero facture: $id_compteur";?></td><td style="width: 20%;"></td><td style="width: 40%;"><?php echo "Prenom: $prenom";?></td></tr>
                    <tr><td style="width: 40%;"><?php echo "Date facture: $date";?></td><td style="width: 20%;"></td><td style="width: 40%;"><?php echo "Nom: $nom";?></td></tr>
                    <tr><td style="width: 40%;"><?php echo "ID Abonne: $id_abonne";?></td><td style="width: 20%;"></td><td style="width: 40%;"><?php echo "Adresse: $adresse";?></td></tr>
                 </table><br/><br/>
                <table cellspacing="0" style="width: 100%; font-size: 12pt;" >
                    <tr>
                        <td style="width: 100%;">Nous avons releve votre compteur d'eau le <?php echo $date; ?> pour la periode du : <?php echo $periode; ?> au <?php echo $date; ?></td>
                    </tr>
                </table>
                <br>
				<table cellspacing="0" style="padding: 1px; width: 100%; border: solid 2px #000000; font-size: 11pt; ">
                    <tr>
                        <th style="width: 100%; text-align: center; border: solid 1px #000000;" colspan="7">
                            DETAILS DE LA FACTURATION
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 6%; border: solid 1px #000000;" >An-index</th>
						<th style="width: 6%; border: solid 1px #000000;">Nv-index</th>
						<th style="width: 8%; border: solid 1px #000000;">Consommation d'eau(m3)</th>
						<th style="width: 8%; border: solid 1px #000000;">Tarif(FCFA/m3)</th>
						<th style="width: 12%; border: solid 1px #000000;">Montant Consommation(CFA)</th>
						<th style="width: 8%; border: solid 1px #000000;">Solde anterieur(FCA)</th>
                    </tr>
					<tr>
						<td style="width: 8%; border: solid 1px #000000;" > <?php echo $ancien_index; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"> <?php echo $nouvel_index; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"><?php echo $diff; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"><?php echo $tarif; ?></td>
						<td style="width: 8%; border: solid 1px #000000;"> <?php echo $montant;?></td>
						<td style="width: 8%; border: solid 1px #000000;"><?php echo $dette;?></td>
					</tr>
					<tr>
						<td style="width: 8%; border: solid 1px #000000;" colspan="4" ><strong>TOTAL  DE LA FACTURE</strong></td>
						<td style="width: 8%; border: solid 1px #000000;" colspan="2" ><?php echo $montant+$dette; ?> FCFA</td>
					</tr>
					<tr>
						<td style="width: 5%; border: solid 1px #000000;" colspan="6" align="center"><strong>A PAYER AVANT LE  <?php echo $date_expiration; ?></strong></td>
					</tr>
                </table>
            </td>
		</tr><tr><td style="height: 30%;"></td></tr>
    </table>
	<?php
	}
	?>
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
