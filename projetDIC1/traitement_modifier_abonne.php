<?php
session_start();

//require("head.php");
require("connexion.php");
include("MesFonctions.php");




        $id=$_POST['id_abonne'];
        $nom=$_POST['nom'];
        
        $prenom=$_POST['prenom'];
        $datenais=$_POST['datenaiss'];
       $cni=$_POST['cni'];
        $lieunais=$_POST['adresse'];
        $sexe=$_POST['sexe'];
        $datecnideliv=$_POST['datecnideliv'];
        $datecniexp=$_POST['datecniexp'];
        $profession=$_POST['profession'];
        $specialite=$_POST['specialite'];
        $matrimonial=$_POST['matrimonial'];
        $dateentre=$_POST['dateentree'];
        $teint=$_POST['teint'];
        $taille=$_POST['taille'];
                       
                             
updateciyoyen($id,$nom,$prenom,$datenais,$lieunais,$cni,$sexe,$datecnideliv,$datecniexp,$profession,$specialite,$matrimonial,$dateentre,$teint,$taille);


//header("Location:modifcontact.php");
?>  
<script language="JavaScript">
    alert("Les informations ont ete modifis avec succes!!");
    window.location.replace("body.php");// On inclut le formulaire d'identification
</script>