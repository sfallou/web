<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=asufor;charset=utf8', 'root', 'passer');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>


<?php
echo gettype($bdd);
/*
$ancien_index=3015;
$date_index=date('Y-m-d');
$timestamp=strtotime($date_index);
$etat=0;
$special=1;
$id_abonne=1;
$sql = "INSERT INTO compteur (ancien_index, nouvel_index, date_index, timestamp, etat, id, special) VALUES ('$ancien_index', '$ancien_index', '$date_index', '$timestamp', '$etat', '$id_abonne', '$special');";
//$requete3 = $bb->query("INSERT INTO compteur (ancien_index, nouvel_index, date_index, timestamp, etat, id, special) VALUES('$ancien_index','$ancien_index','$date_index','$timestamp','$etat','$id_abonne','$special')");
$resultat3= $bbd->query($sql);
*/
?>