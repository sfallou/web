<?php
$num=$_GET['num'];
$choix=$_GET['choix'];
$nbLigneMat1=$_GET['nbLigneMat1'];
$nbColoneMat1=$_GET['nbColoneMat1'];
$nbLigneMat2=$_GET['nbLigneMat2'];
$nbColoneMat2=$_GET['nbColoneMat2'];
$matrice1=$_GET['matrice1'];
$matrice2=$_GET['matrice2'];

$tout="$num;$choix;$nbLigneMat1;$nbColoneMat1;$nbLigneMat2;$nbColoneMat2;$matrice1;$matrice2";
$cmd="echo $tout >> /test/data.txt";
exec($cmd);
?>
