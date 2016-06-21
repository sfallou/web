<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$i=date("i");
$dates=$d.$m.$y.$h.$i;

//on recupere les variables

$traitement=$_GET['traitement'];
$num=$_GET['num'];
$num="00$num";
$reply="Channel: LOCAL/answer@answer\nApplication: DongleSendSMS\nData: dongle0,$num,$traitement";
$cmd1="echo \"$reply\" > /var/spool/asterisk/outgoing/rep.call";
exec($cmd1);
echo$reply;
?>
