<?php
//init_set("display_errors",1);error_reporting(1);
//connexion à la bdd
$bdd = new PDO('mysql:host=localhost;dbname=challenge2016', 'root', 'passer',array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>