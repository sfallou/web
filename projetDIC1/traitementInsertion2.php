<?php
session_start();
//require("verification.php"); 

$tel=$_POST['tel'];
$email=$_POST['email'];
$telGondwana=$_POST['telGondwana'];
$adresseGondwana=$_POST['adresseGondwana'];
$telSenegal=$_POST['telSenegal'];
$adresseSenegal=$_POST['adresseSenegal'];
$adresseTravail=$_POST['adresseTravail'];
$adresseDomicile=$_POST['adresseDomicile'];
/******************** Les sessions**************/

$_SESSION['cty_tel']=$tel;
$_SESSION['cty_email']=$email;
$_SESSION['cty_telGondwana']=$telGondwana; 
$_SESSION['cty_adresseGondwana']=$adresseGondwana;
$_SESSION['cty_telSenegal']=$telSenegal;
$_SESSION['cty_adresseSenegal']=$adresseSenegal;
$_SESSION['cty_adresseTravail']=$adresseTravail;
$_SESSION['cty_adresseDomicile']=$adresseDomicile;                      
        
 header("Location:formParent.php");                 

?>  
