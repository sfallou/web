<?php
if($_GET['mois'])
{
$mois=$_GET['mois'];
			switch($mois)
			{
				case"janvier": $mois="01";
				break;
				case"fevrier": $mois="02";
				break;
				case"mars": $mois="03";
				break;
				case"avril": $mois="04";
				break;
				case"mai": $mois="05";
				break;
				case"juin": $mois="06";
				break;
				case"juillet": $mois="07";
				break;
				case"aout": $mois="08";
				break;
				case"septembre": $mois="09";
				break;
				case"octobre": $mois="10";
				break;
				case"novembre": $mois="11";
				break;
				case"decembre": $mois="12";
				break;
			}
}
else 
{
	$mois="01";	
}
$text="<?php \$mois=\"$mois\";?>";
$fp = fopen("mois.php","w"); // ouverture du fichier en écriture
fputs($fp, "$text"); // on écrit les commandes dans le fichier
fclose($fp);	
header('Location: x.php');			
?>