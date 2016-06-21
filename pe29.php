<?php
/**
 * Code qui sera aeeplé par un objet XHR et qui
 * retournera la liste déroulante des départements
 * correspondant à la région sélectionnée.
 */
/* Paramètres de connexion */
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=pe29;charset=utf8', 'root', 'passer');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



/* On récupère les scores*/

$score1 = $_GET['score1']
//$score2 = isset($_GET['score2'])

$date=date('Y-m-d');
// Insertion des informations dans la bdd
$requete = " INSERT INTO resultats (score1,score2,date_score) VALUES('$score1','$score1','$date')";
$resultat= $bdd->query($requete);


?>
