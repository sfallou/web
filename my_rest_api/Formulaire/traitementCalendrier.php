<?php
require("connexion.php");

$calendrier = $_FILES['calendrier']['name'];
$extensions=array('.png','.PNG','.jpg','.JPG');
$typecalendrier=strrchr($calendrier,".");
$linkcalendrier=$_FILES['calendrier']['tmp_name'];
if(in_array($typecalendrier,$extensions)){
	$date=date('H_i_s');
	$calendrier="$date$typecalendrier";

	$envoi=move_uploaded_file($linkcalendrier,'Calendrier/'.$calendrier);

	if($envoi){
		//echo "$nom_ecole </br> $abrev </br> $points";
		$chemin="./Calendrier/$calendrier";
		$requete=$bdd->prepare("INSERT INTO Calendrier (chemin) VALUES (?) ");
		$bool=$requete->execute(array($chemin));


	}
}

?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("index.php");// On se replace à l'index
</script>