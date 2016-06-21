<?php 
session_start();
require('secure.php');	?>

<script type="text/javascript" src="Highcharts/jquery/jquery.min.js"></script>
<script type="text/javascript" src="Highcharts/js/highcharts.js"></script>
<script src="Highcharts/js/modules/exporting.js"></script>
<script type="text/javascript" src="Highcharts/js/themes/dark-blue.js"></script>
	

<h4 align="center">LES STATISTIQUES EN TEMPS REELS</h4><br /><br />
<?php
include ("stat_depense.php");
include ("stat_recette.php"); 
?>
<table>
	<tr>
		<td> <div id="depense" style="width:30%"></div></center></td>
		<td><div id="recette" style="width:30%"></div></center></td>
	</tr>
</table>		

