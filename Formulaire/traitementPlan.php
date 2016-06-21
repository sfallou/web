<?php
require("connexion.php");

$plan = $_FILES['plan']['name'];
$extensions=array('.png','.PNG','.jpg','.JPG');
$typeplan=strrchr($plan,".");
$linkplan=$_FILES['plan']['tmp_name'];
$date=date('H_i_s');
if(in_array($typeplan,$extensions)){
$plan="$date$typeplan";
	$envoi=move_uploaded_file($linkplan,'Plans/'.$plan);

	if($envoi){
		//echo "$nom_ecole </br> $abrev </br> $points";
		$chemin="./Plans/$plan";
		$requete=$bdd->prepare("INSERT INTO Plans (chemin) VALUES (?) ");
		$bool=$requete->execute(array($chemin));


	}
}

?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("liste_plans.php");// On se replace à l'index
</script>