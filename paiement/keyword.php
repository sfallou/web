<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$i=date("i");
$dates=$d.$m.$y.$h.$i;

//on recupere les variables

$message=$_GET['message'];

list($keyword) = explode(" ", $message);
 
$keyword=strtolower($keyword);
if($keyword=="paiement")
{
$rep=1;
echo $rep;
}
else 
{
	$rep=0;
	echo $rep;
}
?>
