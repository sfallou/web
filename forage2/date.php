<?php
// Enregistrons les informations de date dans des variables

$jour = date("d");
$mois = date("m");
$annee = date("Y");

$heure = date("H");
$minute = date("i");
?>
	
<?php
$date="$annee-$mois-$jour";
list($year, $month, $day) = explode("-", $date);

$months = array("janvier", "fevrier", "mars", "avril", "mai", "juin",
    "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
$month = $months[$month-1];

?>
