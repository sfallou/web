<?php
//init_set("display_errors",1);error_reporting(1);
//connexion à la bdd
include("connexion.php");



$logo = $_FILES['logo']['name'];
$extensions=array('.png','.PNG','.jpg','.JPG');
$typelogo=strrchr($logo,".");
$linklogo=$_FILES['logo']['tmp_name'];
if(in_array($typelogo,$extensions)){

	$logo="$abrev$typelogo";

	$envoi=move_uploaded_file($linklogo,'Logos/'.$logo);

	if($envoi){
		//echo "$nom_ecole </br> $abrev </br> $points";
		$logo_ecole="./Logos/$logo";
		$nom_ecole=$_POST["nom_ecole"];
		$points=$_POST["points"];
		$abrev=$_POST["abrev"];
		$etat_ecole=$_POST["etat"];
		$date=date("Y-m-d hh:mm:ss");
		$requete=$bdd->query("UPDATE Ecoles SET nom_ecole='$nom_ecole',abreviation='$abrev',points='$points',etat_ecole='$etat_ecole',logo_ecole='$logo_ecole'");
	}
}



?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("accueil.php");// On se replace à l'accueil
</script>