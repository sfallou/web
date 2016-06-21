<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$i=date("i");
$dates=$d.$m.$y.$h.$i;

//on recupere les variables

$traitement=$_GET['rep'];
$num=$_GET['num'];

/*$message=$traitement;
$tel="+221$num";
$text="Channel: LOCAL/answer@answer\nApplication: DongleSendSMS\nData:dongle0,$tel,\"$message\"";
$fp =fopen("/tmp/rep$dates.call","w");
fputs($fp,"$text");
fclose($fp);
$cmd="cp /tmp/rep$dates.call /var/spool/asterisk/outgoing";
exec($cmd);*/
echo$traitement;
?>
