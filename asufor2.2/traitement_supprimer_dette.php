<?php
require('head.php');
require('header.php'); 
require('classes/utilisateurs.php');

//récupération des informations 
$id_dette=$_GET["id"];  
/***********************/
$dette=new Finance($bdd);
$dette->supprimerDette($id_dette);
?>
<script language="JavaScript">
alert("Suppression effectuee avec succes!!");
window.location.replace("supprimer_dette.php");// On inclut le formulaire d'identification
</script>

        

