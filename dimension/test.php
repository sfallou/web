<?php 

$test = "espeak ­-v fr+f5 ­-s 135 \"Pour vous satisfaire\" ­-w /son/son.wav"; 

// création du fichier son 
exec($test); 
/*$son = "sox /son/son$num.wav ­-r 8000 ­-c1 ­-e gsm-full-rate /son/son$num.gsm"; 
exec($son); 
$rm = "rm /son/son$num.wav"; 
exec($rm); 
/*
$cmd="touch /son/yup.txt";
exec($cmd);
*/
?>