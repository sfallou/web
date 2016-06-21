<?php
/**
 * Code qui sera aeeplé par un objet XHR et qui
 * retournera la liste déroulante des départements
 * correspondant à la région sélectionnée.
 */
/* Paramètres de connexion */
$serveur = "localhost";
$admin   = "root";
$mdp     = "";
$base    = "asufor";

/* On récupère l'identifiant du mois choisi. */
$idm = isset($_GET['idm']) ? $_GET['idm'] : false;
/* Si on a un mois, on procède à la requête */
if(false !== $idm)
{
	$id=2;
	//$date="2014-$idm-10";
 /* Cération de la requête pour avoir les index de ce mois */
    $sql2 ="SELECT ancien_index,nouvel_index,id,id_compteur,date_index, YEAR(date_index) AS annee FROM compteur WHERE id='$id' AND MONTH(date_index)='$idm' ORDER BY date_index DESC LIMIT 0,1";			
    $connexion = mysql_connect($serveur, $admin, $mdp);
    mysql_select_db($base, $connexion);
    $rech_index = mysql_query($sql2, $connexion);
    if($ligne_index = mysql_fetch_array($rech_index))
    {
 
		$ancien_index = $ligne_index['ancien_index'];
		$nouvel_index = $ligne_index['nouvel_index'];
		$date_index = $ligne_index['date_index'];
		 /* Maintenant on peut construire le tableau */
		 $liste = '<table border="1">';
		$liste .= '<tr><td><input type="text" name="date_index" id="date_index" value="'. $date_index .'"/></td>
					<td><input type="text" name="ancine_index" id="ancien_index" value="'. $ancien_index .'"/></td>
					<td><input type="text" name="nouvel_index" id="ancien_index" value="'. $nouvel_index .'"/></td>
				</tr>';
    /* Affichage de la liste déroulante */
    echo($liste);
	}
	else
	{
    echo"Pas d'enregistrement pour ce mois";
	}
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La région sélectionnée comporte une donnée invalide.</p>\n");
}
?>