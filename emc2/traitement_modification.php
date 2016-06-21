
<?php

function changedate($date)//$date contient 12/31/2010 18:39:48
{
 $array = explode(' ', $date); //on separe 12/31/2010 et 18:39:48 dans un array
 $array2 = explode ('/', $array[0]); //on separe 12 et 31 et 2010 dans un new array
 $newdate = $array2[2].'-'.$array2[0].'-'.$array2[1].' '.$array[1]; //on remet le tout dans le bon sens avec le "a"
 return $newdate; //$newdate contient 2010-12-31 18:39:48
}
?> 
<?php
require("connexion_bd.php");
$identifiant=$_POST['identifiant'];
//on associe l'identifiant au nom de l'entreprise
	if($identifiant==1)
	$entreprise="EmC2-Group";
	if($identifiant==2)
	$entreprise="ESP";
	if($identifiant==3)
	$entreprise="Hopital Fann";
foreach($_POST["options"] as $check)
{
if( isset($check) )
	{
	$checkoptions = $check;
	list($date, $heure, $telephone) = explode("-", $checkoptions);
	//echo"$date<br/>$heure<br/>$telephone";
	$req1=mysql_query("DELETE FROM agenda2 WHERE id_proprietaire='$identifiant' AND rv='$date' AND heures='$heure' AND telephone='$telephone'");
	
	//on génére un code de 10 chiffre
	$characts   = '1234567890'; 
	$code   = 'EMC2'; 

	for($i=0;$i < 6;$i++)    //6 est le nombre de caractères
	{ 
        $code.= substr($characts,rand()%(strlen($characts)),1); 
	}
	//on met le client dans la liste d'attente
	$req2=mysql_query("INSERT INTO attente (telephone,code,id_entreprise) VALUES('$telephone','$code','$identifiant')");
	//on le lui notifie par sms
	$message="Votre rendez-vous pour le $date:$heure est annule.On vous fixera un autre bientot.$entreprise ";
		$tel="+221$telephone";
		$text="Channel: LOCAL/answer@answer\nApplication: DongleSendSMS\nData: dongle0,$tel,\"$message\"";
		$fp = fopen("/tmp/sms$code.call","w"); // ouverture du fichier en écriture
		fputs($fp, "$text"); // on écrit les commandes dans le fichier
		fclose($fp);
		//on place le fichier dans /var/spool/asterisk/outgoing
		$cmd="cp /tmp/sms$code.call /var/spool/asterisk/outgoing";
		exec($cmd);
	
	}
else
	{ 
	echo "Alerte!! Aucune selection!!";
	}
}
?>

<?php

header('Location: calendrier.php');
?>
