<?php
session_start();
//ini_set("display_errors",0);error_reporting(0);
require("connexion.php");
require("variables.php");
//include("date.php");
include("changer_format_date.php");
?>
<?php

function convert_mois($num_mois)
{
$months = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin",
    "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
return $months[$num_mois-1];
}

/*********Fonction de sauvegarde automatique de la base de donnée**********/
  function dumpMySQL($serveur, $login, $password, $base, $mode) //$mode=3
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
    ?>