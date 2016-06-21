<?php
session_start();
//require("verification.php"); 
require("connexion.php");
include("MesFonctions.php");




$idcontact=$_POST['idcontact'];
$tel=$_POST['Telephone'];
$email=$_POST['email'];
$telGondwana=$_POST['telGondwana'];
$adresseGondwana=$_POST['adresseGondwana'];
$telSenegal=$_POST['telSenegal'];
$adresseSenegal=$_POST['adresseSenegal'];
$adresseTravail=$_POST['adresseTravail'];
$adresseDomicile=$_POST['adresseDomicile'];
$contactcni=$_POST['contactcni'];
/******************** Les sessions**************/

  updatecontact($tel,$email,$telGondwana,$adresseGondwana,$telSenegal,$adresseSenegal,$adresseTravail,$adresseDomicile,$contactcni)                  
        
 //header("Location:modifParent.php");                 

?>  
<script language="JavaScript">
    alert("Les informations ont ete modifie avec succes!!");
    window.location.replace("body.php");// On inclut le formulaire d'identification
</script>
