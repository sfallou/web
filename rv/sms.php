<?php
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$i=date("i");
$dates=$d.$m.$y.$h.$i; 

$choix=$_GET['choix']; 
$num=$_GET['num']; 
$jour=$_GET['day'];
$date=$_GET['date'];
$mois=$_GET['month'];
$annee=$_GET['year'];
$heure=$_GET['hour'];
$minute=$_GET['min'];
$rv="$jour $date $mois";
$hours="$heure:$minute";

//connexion à la base de donnée
@mysql_connect('localhost','root','passer') or die("Echec de connexion"); 
@mysql_select_db('planning') or die("Echec de sélection de la base."); 

//on génére un code de 10 chiffre
$characts   = '1234567890'; 
	$code   = 'EMC2'; 

	for($i=0;$i < 6;$i++)    //6 est le nombre de caractères
	{ 
        $code.= substr($characts,rand()%(strlen($characts)),1); 
	}
	
	// si le rv existe 
if(!empty($jour))
{
	//on enregistre le code dans la base de donnéés
	$requ=mysql_query("UPDATE agenda2 SET code='$code' WHERE rv='$rv' AND heures='$hours'");
	
	//on ecrit le message à envoyer
	
	$text="Votre rendez-vous est pour le $rv a $hours.Code RV=$code";
echo $text;
}
else 
{
	//on enregistre le numero et le code dans la liste d'attente
	$req=mysql_query("INSERT INTO attente (telephone,code,id_entreprise) VALUES ('$num','$code','$choix')");
}
?>
