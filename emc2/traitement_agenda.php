
<?php

function changedate($date)//$date contient 12/31/2010 18:39:48
{
 $array = explode(' ', $date); //on separe 12/31/2010 et 18:39:48 dans un array
 $array2 = explode ('/', $array[0]); //on separe 12 et 31 et 2010 dans un new array
 $newdate = $array2[2].'-'.$array2[0].'-'.$array2[1].' '.$array[1]; //on remet le tout dans le bon sens avec le "a"
 return $newdate; //$newdate contient 2010-12-31 18:39:48
}
?> 
<?php
require("connexion_bd.php");
$dates=$_POST['date'];
$identifiant=$_POST['identifiant'];
foreach($_POST["options"] as $check)
{
if( isset($check) )
	{ $checkoptions = $check;
	$code="0";
	$req=mysql_query("INSERT INTO agenda2 (rv,heures,telephone,code,id_proprietaire,etat) VALUES('$dates','$checkoptions',0,'$code','$identifiant',0)");
	}
else
	{ 
	echo "Alerte!! Aucune heure n'est choisie!!";
	}
}
?>

<?php

header('Location: calendrier.php');
?>
