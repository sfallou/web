<?php


class Date{




var $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
var $months = array('Janvier','F�vrier','Mars','Avril','Mai','Juin','Juillet','Ao�t','Septembre','Octobre','Novembre','D�cembre');



function getEvents($date){
// Connexion � la bdd, n'oubliez de changer $cnx, c'est ma m�thode
global $DB;
// Pour la requete ajoutez heure dans le select
$req = $DB->query("SELECT * FROM agenda2 WHERE rv='$date' AND etat=0");
$r ="";
	while ($donnees = $req->fetch())
		{
		$rv=$donnees['rv'];
		$heures=$donnees['heures'];
		$r.=$heures." <input type='checkbox' name='options[]' value='$heures' checked/><br> ";
		}
$req->closeCursor(); // Termine le traitement de la requ�te

return $r;
}

function getAll($year){
$r = array();
/*
$date = strtotime($year.'-01-01');
while(date('Y',$date) <= $year){
$y=date('Y',$date);
$m=date('n',$date);
$d=date('j',$date);
$w=str_replace('0','7', date('w',$date));
$r[$y][$m][$d]= $w;
$date = strtotime(date('Y-m-d', $date).'+1 DAY');
}
*/

$date = new DateTime($year.'-01-01');
while($date->format('Y') <= $year){
$y=$date->format('Y') ;
$m=$date->format('n') ;
$d=$date->format('j') ;
$w=str_replace('0','7', $date->format('w') );
$r[$y][$m][$d]= $w;
$date->add(new DateInterval('P1D'));
}

return $r;

}
/*
function showHours($agenda){
	$r = array();
	include ('heures.php');
	return $r;
}
*/
}   
