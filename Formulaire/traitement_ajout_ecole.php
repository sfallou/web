<?php
//init_set("display_errors",1);error_reporting(1);
//connexion à la bdd
include("connexion.php");
$logo = $_FILES['logo']['name'];
$extensions=array('.png','.PNG','.jpg','.JPG');
$typelogo=strrchr($logo,".");
$linklogo=$_FILES['logo']['tmp_name'];
if(in_array($typelogo,$extensions)){
	$nom_ecole=$_POST['nom_ecole'];
	$abrev=$_POST['abrev'];
	$points=$_POST['points'];
	$logo="$abrev$typelogo";

	$envoi=move_uploaded_file($linklogo,'Logos/'.$logo);

	if($envoi){
		//echo "$nom_ecole </br> $abrev </br> $points";
		$logo_ecole="./Logos/$logo";
		$nom_ecole=$_POST["nom_ecole"];
		$points=$_POST["points"];
		$abrev=$_POST["abrev"];
		$etat_ecole=1;
		$date=date("Y-m-d hh:mm:ss");
		$requete=$bdd->prepare("INSERT INTO Ecoles (nom_ecole,abreviation,points,etat_ecole,logo_ecole) VALUES (?,?,?,?,?) ");
		$bool=$requete->execute(array($nom_ecole,$abrev,$points,$etat_ecole,$logo_ecole));


	}
}



?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("ajouter_ecole.php");// On se replace à l'index
</script>