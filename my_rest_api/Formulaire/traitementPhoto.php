<?php
require("connexion.php");

$photo = $_FILES['photo']['name'];
$extensions=array('.png','.PNG','.jpg','.JPG');
$typephoto=strrchr($photo,".");
$linkphoto=$_FILES['photo']['tmp_name'];
$date=date('H_i_s');
if(in_array($typephoto,$extensions)){
	//nom générique pour les photos: h_m_sPhoto.extension
	$nomGenerique="Photo";
	$photo="$date$nomGenerique$typephoto";

	$envoi=move_uploaded_file($linkphoto,'Photos/'.$photo);

	if($envoi){
		//echo "$nom_ecole </br> $abrev </br> $points";

		$chemin="./Photos/$photo";
		$date_photo=date('Y-m-d H:i:s');
		$requete=$bdd->prepare("INSERT INTO Photos (nom_photo,chemin,date_photo) VALUES (?,?,?) ");
		$bool=$requete->execute(array($photo,$chemin,$date_photo));


	}
}
?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("index.php");// On se replace à l'index
</script>