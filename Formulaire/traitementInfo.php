<?php
require("connexion.php");


$image_info = $_FILES['image_info']['name'];
$extensions=array('.png','.PNG','.jpg','.JPG');
$typeimage_info=strrchr($image_info,".");
$linkimage_info=$_FILES['image_info']['tmp_name'];
if(in_array($typeimage_info,$extensions)){
	$titre=$_POST['titre'];
	$contenu=$_POST['contenu'];
	$date_info=$_POST['date_info'];
	$date=date('H_i_s');
	$image_info="$date$typeimage_info";

	$envoi=move_uploaded_file($linkimage_info,'Infos/'.$image_info);

	if($envoi){
		//echo "$nom_ecole </br> $abrev </br> $points";
		$image_info="./Infos/$image_info";
		$titre=$_POST["titre"];
		$contenu=$_POST["contenu"];
		$date_info=$_POST["date_info"];
		$heure_info=date("H:i");
		$requete=$bdd->prepare("INSERT INTO Infos (titre,contenu,date_info,image_info,heure_info) VALUES (?,?,?,?,?) ");
		$bool=$requete->execute(array($titre,$contenu,$date_info,$image_info,$heure_info));


	}
}


?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("nouvelle_info.php");// On se replace à l'index
</script>