<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$i=date("i");
$dates=$d.$m.$y.$h.$i;

//on recupere les variables
$num=$_GET['num'];
$sms=$_GET['sms'];
echo "Paiement effectue avec succes.Merci";
?>


