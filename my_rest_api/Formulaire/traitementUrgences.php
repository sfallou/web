<?php
require("connexion.php");


		$urgence=$_POST["urgence"];
		$numeros_tel=$_POST["numeros_tel"];
		$detail_urgence=$_POST["detail_urgence"];
		
		$requete=$bdd->prepare("INSERT INTO Urgences (urgence,numeros_tel,detail_urgence) VALUES (?,?,?) ");
		$bool=$requete->execute(array($urgence,$numeros_tel,$detail_urgence));


?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("index.php");// On se replace à l'index
</script>