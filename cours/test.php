<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$i=date("i");
$dates=$d.$m.$y.$h.$i;

//on recupere les variables

$traitement="Hey it's ok";
$num=778757730;
$cmd1="echo \"Channel: LOCAL/answer@answer\nApplication: DongleSendSMS\nData: dongle0,$num,$traitement\" > /var/www/html/paiement/rep$dates.call";
//$cmd1="echo \"$reply\" > /var/spool/asterisk/outgoing/rep$dates.call";
exec($cmd1);
$reply="Channel: LOCAL/answer@answer\nApplication: DongleSendSMS\nData: dongle0,$num,$traitement";
echo$reply;
?>
