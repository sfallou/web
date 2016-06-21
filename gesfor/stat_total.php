<?php 
 session_start();
  require('secure.php');
  require_once ("header.php");
  require_once ('connexion.php');
  require_once ('classes/Statistique.php' );
  require_once ('classes/utilisateurs.php' );
 ?>

<script type="text/javascript" src="Highcharts/jquery/jquery.min.js"></script>
<script type="text/javascript" src="Highcharts/js/highcharts.js"></script>
<script src="Highcharts/js/modules/exporting.js"></script>
<script type="text/javascript" src="Highcharts/js/themes/dark-blue.js"></script>
	
	<title>Statistique abonnes</title>

<h1 align="center">LES STATISTIQUES EN TEMPS REELS</h1><br /><br />
<?php
include ("stats1.php");
include ("stat_bilan.php"); 
?>
<center><div id="abonne" style="width:80%"></div></center>
<br/ ><br/><br />
<center><div id="bilan" style="width:80%"></div></center>
<?php require('footer.php'); ?>