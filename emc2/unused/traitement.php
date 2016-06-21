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
$date=$_POST["date"];
echo "$date <br/>";
foreach($_POST["options"] as $check)
{
if( isset($check) )
	{ $checkoptions = $check;
	//$datetime=$date." ".$check;
	//$datetime=changedate($datetime);
	//$timestamp=strtotime("$datetime");
	
	echo "$checkoptions <br/>";
	}
else
	{ 
	echo "Alerte!! Aucune heure n'est choisie!!";
	}
}
?>

