<?php

$entreprise="emc2";
$rv="le 10 janvier 2010";
$code="556688"
$sms="Votre rendez-vous au niveau de $entreprise est pour $rv.\nVotre code RV est $code."
$destinataire=00221778757730;
$req = curl_init();
$url="http//localhost/tester.php?num=$destinataire&sms=$sms";
curl_setopt($req, CURLOPT_URL,$url);
curl_exec($req);

$telephone=$_GET['num'];
$sms1=$_GET['sms'];
$echo=echo "$telephone<br/>$sms1";
?>
