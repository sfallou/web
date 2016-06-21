<?php
require("connexion_bd.php");
//on regarde s'il y a des infos dans la liste d'attente
$req=mysql_query("SELECT * FROM attente");
while($data=mysql_fetch_array($req)) 
{
	$id=$data['id'];
	$telephone=$data['telephone'];
	$code=$data['code'];
	$id_entreprise=$data['id_entreprise'];
	//on associe l'id_entreprise au nom de l'entreprise
	if($id_entreprise==1)
	$entreprise="EmC2-Group";
	if($id_entreprise==2)
	$entreprise="ESP";
	if($id_entreprise==3)
	$entreprise="Hopital Fann";
	//on regarde s'il y a des rv disponibles dans l'agenda de l'entreprise
	$request=mysql_query("SELECT * FROM agenda2 WHERE id_proprietaire='$id_entreprise' AND etat=0 ORDER BY id DESC LIMIT 0,1");
	if($don=mysql_fetch_array($request))
	{
		$rv=$don['rv'];
		$heures=$don['heures'];
		$message="Votre rendez-vous a $entreprise est pour le $rv a $heures.Code RV=$code";
		$tel="+221$telephone";
		$text="Channel: LOCAL/answer@answer\nApplication: DongleSendSMS\nData: dongle0,$tel,\"$message\"";
		$fp = fopen("/tmp/sms$id.call","w"); // ouverture du fichier en écriture
		fputs($fp, "$text"); // on écrit les commandes dans le fichier
		fclose($fp);
		//on place le fichier dans /var/spool/asterisk/outgoing
		$cmd="cp /tmp/sms$id.call /var/spool/asterisk/outgoing";
		exec($cmd);
		//on marque le rv comme résérvé
		$requ=mysql_query("UPDATE agenda2 SET telephone='$telephone',code='$code',etat=1 WHERE rv='$rv' AND heures='$heures' AND id_proprietaire='$id_entreprise'");
		//on spprime l'info de la liste d'attente
		$req1=mysql_query("DELETE FROM attente WHERE id='$id'");
	}
}

?>
