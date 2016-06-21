<?php
// Enregistrons les informations de date dans des variables
/*
$jour = date("d");
$mois = date("m");
$annee = date("Y");

$heure = date("H");
$minute = date("i");
*/
?>
	
<?php
function convert_mois($num_mois)
{
$months = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin",
    "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
return $months[$num_mois-1];
}
?>
