<?php
session_start();
//require("verification.php"); 
require("connexion.php");
include("MesFonctions.php");

$cni=$_POST['cni'];
$prenomPere=$_POST['prenomPere'];
$prenomMere=$_POST['prenomMere'];
$nomMere=$_POST['nomMere'];
$prenomConjoint=$_POST['prenomConjoint'];
$nomConjoint=$_POST['nomConjoint'];

updateparent($cni,$prenomPere,$prenomMere,$nomMere,$prenomConjoint,$nomConjoint);



?>  
<script language="JavaScript">
    alert("Les informations ont ete modifie avec succes!!");
    window.location.replace("body.php");// On inclut le formulaire d'identification
</script>


