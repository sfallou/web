<?php
//connexion à la base de données
require("connexion_bd.php");
	//récupération des informations 
/*oreach($_POST["nouvel_index"] as $i=>$index) 
{
if(isset($_POST["nouvel_index"]))
{
$nouvel_index=$_POST["nouvel_index"][$i];
$id_abonne=$_POST["id_abonne"][$i];
$date_index=$_POST["date_index"][$i];
*/
if(!empty($_POST["nouvel_index"]))
{
$nouvel_index=$_POST["nouvel_index"];
$id_abonne=$_POST["id_abonne"];
$date_index=$_POST["date_index"];
list($y,$m,$d)=explode("-",$date_index);
$m=$m-1;
$etat=0;
$timestamp=strtotime($date_index);  //conversion de la date d'abonnement en timestamp

$sql=mysql_query("SELECT DISTINCT nouvel_index,id FROM compteur WHERE id='$id_abonne' AND MONTH(date_index)='$m' AND YEAR(date_index)='$y' ");
		if($datas = mysql_fetch_array($sql))
		{
		$ancien_index = $datas['nouvel_index'];
		}
		else{$ancien_index=0;}	
	
    // Insertion des informations dans la table compteur
	$requete = " INSERT INTO compteur (ancien_index,nouvel_index,date_index,timestamp,etat,id) VALUES('$ancien_index','$nouvel_index','$date_index','$timestamp','$etat','$id_abonne')";
	$resultat= mysql_query($requete);
	$reque=mysql_query("UPDATE abonne SET etat=0 WHERE id_abonne='$id_abonne' ");
	
	//$requete = " UPDATE compteur SET ancien_index='$ancien_index',nouvel_index='$nouvel_index',date_index='$date_index',timestamp='$timestamp',etat='$etat' WHERE id='$id_abonne' AND ancien_inex='$ancien_index'";
	//$resultat= mysql_query($requete);	
	
?>
<script language="JavaScript">
	alert("Enregistré avec succès!!");
	window.location.replace("g_liste_abonnes.php");// On inclut le formulaire d'identification
	</script>
<?php
}
else
{
?>
<script language="JavaScript">
	alert("Attention!! veuillez donner le nouvel_index!");
	window.location.replace("g_liste_abonnes.php");// On inclut le formulaire d'identification
	</script>
<?php
}
?>
