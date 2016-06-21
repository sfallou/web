<?php
session_start();
$_SESSION['nom']="ndiaye";
$_SESSION['prenom']="sfallou";
$nom=$_SESSION['nom'];
echo "Bonjour Mr $nom! vous êtes à la page index.php de monsite <br/>
<a href='page2.php'>Vers Page2</a>";
?>
