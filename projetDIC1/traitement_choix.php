<?php
session_start();

$choix=$_POST['choix'];
$id=$_POST['id'];
$_SESSION['id']=$id;

if ($choix=="citoyen"){
header("Location:modifier.php");
}
else if ($choix=="parent"){
		header("Location:modifParent.php");
	} else {
		header("Location:modifcontact.php");
	}

?>