<?php
$host = "localhost";
$user = "root";
$bd = "classe";
$passwd = "passer";

mysql_connect($host, $user , $passwd) or die("Erreur de connexion au serveur");
mysql_select_db($bd) or die("Erreur de connexion a la base de donnees");

?>




$requete="select * from user where email='$email' and password='$pass'";
		$result = mysql_query($requete) or die (mysql_error());
		while($lignes=mysql_fetch_row($result))
        {
            echo "</br>".$lignes[2];
        }
        echo "</br> passage ok";
