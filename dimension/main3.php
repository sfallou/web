<?php
/*$lamda=$_GET['lamda'];
$mu=$_GET['mu'];
$nb=$_GET['n'];
$num=$_GET['num'];
*/
$sms=$_GET['message'];
$numero=$_GET['num'];
//list($lamda,$mu,$nb)=explode(",",$sms);
$tab=explode(" ",$sms);
$lamda=$tab[1];
$mu=$tab[2];
$nb=$tab[3];
echo "$lamda,$mu,$nb<br/>";
$cmd="cd /var/www/html/dimension/ && /usr/bin/python2.7 app.py $lamda $mu $nb $num";
exec($cmd);
/*$fp = fopen("/var/www/html/dimension/solution$num.txt","r"); // ouverture du fichier en lecture
$reply=fgets($fp); 
fclose($fp);
echo $reply;*/
?>