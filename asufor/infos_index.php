<?php
/**
 * Code qui sera aeeplé par un objet XHR et qui
 * retournera la liste déroulante des départements
 * correspondant à la région sélectionnée.
 */
/* Paramètres de connexion */
require("head.php");

/* On récupère l'identifiant du mois choisi. */
$idm = isset($_GET['idm']) ? $_GET['idm'] : false;
/* Si on a un mois, on procède à la requête */
if(false !== $idm)
{
list($id,$annee)=explode("-",$idm);
	$tab='<table border="1" class="table">
			<tr style="background:#094963;color:#fff;" >
				<th >Mois</th>
				<th >Montant</th>
				<th>Ancien Index</th>
				<th>Nouvel Index</th>
			</tr>';
 /* Cération de la requête pour avoir les index de ce mois */
	for($i=1;$i<=12;$i++)
	{
	$mois=convert_mois($i);
    $sql2 ="SELECT DISTINCT id_compteur,ancien_index,nouvel_index,id,date_index FROM compteur WHERE id='$id' AND YEAR(date_index)='$annee' AND MONTH(date_index)='$i'";
	$rech_index = mysql_query($sql2);
    if($data = mysql_fetch_array($rech_index))
    {
		$id_compteur = $data['id_compteur'];
		$id_abonne = $data['id'];
		$nouvel_index = $data['nouvel_index'];
		$ancien_index = $data['ancien_index'];
		$date_index = $data['date_index'];
		$mois_prec=$i-1;
		$montant = $tarif*($nouvel_index-$ancien_index);
		$tab.='<tr><td align="center" class="td">'. $mois .'</td><td align="center" class="td">'. $montant .'</td><td align="center" class="td">'. $ancien_index .'</td>
		<td align="center" class="td">
			<form method="post" action="modifier_index_gerant.php">
			'. $nouvel_index .'';
			if($_SESSION['profil']!="tresorier")
			{
			$tab.='<input type="submit" style="margin-left:45px;" name="modifier" value="Modifier"/>
			<input type="hidden"  name="id_compteur" id="id_compteur" value="'. $id_compteur .'"/>
			<input type="hidden"  name="id_abonne" id="id_abonne" value="'. $id_abonne .'"/>
			</form></td>
			<td><form method="post" action="traitement_facturation.php" >
						<input type="hidden" name="id_compteur" value="'. $id_compteur .'" /> 
						<input type="hidden" name="id_abonne"  value="'. $id_abonne .'" />
						<input type="submit" value="Facturer" /></form>';
			}
			$tab.='</td>  ';	
	}
	else
	{
		$date=$annee."-$i-".date("d");
		$tab.='<tr><td align="center" class="td">'. $mois .'</td><td align="center" class="td">0</td><td text-align="center" class="td">---</td>
				<td align="center" class="td">';
				if($_SESSION['profil']!="tresorier")
				{
			$tab.='<form name="formulaire2" onSubmit="return verif_formulaire()" method="post" action="traitement_index_gerant.php">
			<input type="text" size="5px" name="nouvel_index"/>
			<input type="hidden"  name="id_abonne" id="id_abonne" value="'. $id .'"/>
			<input type="hidden"  name="date_index" id="id_compteur" value="'. $date .'"/>
			<input type="submit" name="enregistrer" value="Enregistrer"/></form>';
				}
			$tab.='</td>';
	}
$tab.='</tr>';	
	}
echo $tab;
echo'</table>';
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La région sélectionnée comporte une donnée invalide.</p>\n");
}
?>