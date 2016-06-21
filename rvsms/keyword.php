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
 

if($keyword=="compte" or $keyword=="COMPTE" )
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
