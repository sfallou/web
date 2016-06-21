<?php
require("connexion.php");

		$nom_equipe=$_POST["nom_equipe"];
		$type_sport=$_POST["type_sport"];
		$type_equipe=$_POST["type_equipe"];
		$id_ecole=$_POST["ecole"];
		$etat_equipe=1;
		$requete=$bdd->prepare("INSERT INTO Equipes (nom_equipe,type_equipe,type_sport,id_ecole,etat_equipe) VALUES (?,?,?,?,?) ");
		$bool=$requete->execute(array($nom_equipe,$type_equipe,$type_sport,$id_ecole,$etat_equipe));


?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("index.php");// On se replace à l'index
</script>