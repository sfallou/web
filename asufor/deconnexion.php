<?php
session_start();
function dumpMySQL($serveur, $login, $password, $base, $mode)
    {
    $connexion = mysql_connect($serveur, $login, $password);
    mysql_select_db($base, $connexion);
     
    $entete = "-- ----------------------\n";
    $entete .= "-- dump de la base ".$base." au ".date("d-M-Y")."\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";
     
    $listeTables = mysql_query("show tables", $connexion);
    while($table = mysql_fetch_array($listeTables))
    {
    // si l'utilisateur a demand? la structure ou la totale
    if($mode == 1 || $mode == 3)
    {
    $creations .= "-- -----------------------------\n";
    $creations .= "-- creation de la table ".$table[0]."\n";
    $creations .= "-- -----------------------------\n";
    $listeCreationsTables = mysql_query("show create table ".$table[0], $connexion);
    while($creationTable = mysql_fetch_array($listeCreationsTables))
    {
    $creations .= $creationTable[1].";\n\n";
    }
    }
    // si l'utilisateur a demand? les donn?es ou la totale
    if($mode > 1)
    {
    $donnees = mysql_query("SELECT * FROM ".$table[0]);
    $insertions .= "-- -----------------------------\n";
    $insertions .= "-- insertions dans la table ".$table[0]."\n";
    $insertions .= "-- -----------------------------\n";
    while($nuplet = mysql_fetch_array($donnees))
    {
    $insertions .= "INSERT INTO ".$table[0]." VALUES(";
    for($i=0; $i < mysql_num_fields($donnees); $i++)
    {
    if($i != 0)
    $insertions .= ", ";
    if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
    $insertions .= "'";
    $insertions .= addslashes($nuplet[$i]);
    if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
    $insertions .= "'";
    }
    $insertions .= ");\n";
    }
    $insertions .= "\n";
    }
    }
     
    mysql_close($connexion);
     
    $fichierDump = fopen("dump.sql", "wb");
    fwrite($fichierDump, $entete);
    fwrite($fichierDump, $creations);
    fwrite($fichierDump, $insertions);
    fclose($fichierDump);
    }
$_SESSION = array();
if (isset($_COOKIE[session_name()]))
{
setcookie(session_name(),'',time()-4200,'/');
}
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
 <head>
 <title>Au revoir</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <!-- Lien vers la favicon -->               
 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" height="48" width="48"/>
 </head>
 <body>
 <div id="corps">
 <h1 style="color-font: #6ba5ef; font-size: 2em;">Vous êtes à présent déconnecté</h1>
 <form action="index.php" method="post">
 <p>
 <input type="submit" value="OK"/>
 </p>
 </form>
 </div>
 <?php
			dumpMySQL("127.0.0.1", "root", "passer", "asufor", 3);
		?>
 </body>
 </html>
