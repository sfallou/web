<?php
$serveur="127.0.0.1";
$login="root";
$pass="passer";
$db="planning";
$cnx=mysql_connect($serveur,$login,$pass);
$sel=mysql_select_db($db);
?>
