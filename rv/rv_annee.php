<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$i=date("i");
$dates=$d.$m.$y.$h.$i;

//on recupere les variables

$choix=$_GET['choix']; 
$num=$_GET['num']; 

@mysql_connect('localhost','root','passer') or die("Echec de connexion"); 
@mysql_select_db('planning') or die("Echec de sélection de la base."); 
$requete = "SELECT id,rv, heures from agenda2 WHERE id_proprietaire='$choix' AND etat=1 AND telephone='$num' ORDER BY id DESC LIMIT 0, 1"; 
$result = mysql_query($requete); 
if($don=mysql_fetch_array($result))
{
//on recupere le rv disponible 
$rv = $don['rv']; 
$heures = $don['heures'];
//on récupére l'année
$rv="$rv";
$l=strlen($rv)-4;
$annee=substr($rv,$l);
echo $annee;
}
else 
{
	$annee=0;
	echo $annee;
}

?>
