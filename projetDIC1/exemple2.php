<?php
//Connexion a la base de données
// Remplacer localhost, highcharts, username, password, par vos informations de connexion.
$hostname = "localhost";
$database = "diplomatie";
$username = "root";
$password = "passer";
$Conn = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
 
mysql_select_db($database, $Conn);
$query_Stats = "SELECT * FROM `sondage`";
$Stats = mysql_query($query_Stats, $Conn) or die(mysql_error());
$row_Stats = mysql_fetch_assoc($Stats);
$totalRows_Stats = mysql_num_rows($Stats);
?>
<html>
<head>
<title>Falaf.net - Highcharts Exemple 2</title>
<!-- Chargement des librairies: Jquery & highcharts -->
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type="text/javascript" src="js/highcharts.js" ></script>
</head>
 
<body>
<div align="center">
<!-- Affichage du nombre de votes par Etat-->
<p><?php 
$pour = mysql_query("SELECT * FROM `sondage` Where Etat='Pour'", $Conn) or die(mysql_error());
$num_rows_pour = mysql_num_rows($pour);
$contre = mysql_query("SELECT * FROM `sondage` Where Etat='Contre'", $Conn) or die(mysql_error());
$num_rows_contre = mysql_num_rows($contre);
$nul = mysql_query("SELECT * FROM `sondage` Where Etat='Sans opinion'", $Conn) or die(mysql_error());
$num_rows_nul = mysql_num_rows($nul);
echo "$num_rows_pour Pour\n";
echo "$num_rows_contre Contre\n";
echo "$num_rows_nul Sans opinion\n";
?></p>
<!-- Affichage de toutes les entrées de la table Vote-->
<p><table width="200" border="1">
  <tr>
    <td width="50">ID</td>
    <td width="150">Etat</td>
  </tr>
   <?php do { ?>
  <tr>
    <td><?php echo $row_Stats['ID']; ?></td>
    <td><?php echo $row_Stats['Etat']; ?></td>
  </tr>
  <?php } while ($row_Stats = mysql_fetch_assoc($Stats)); ?>
</table></p>
<p><div align="center">Pour ou contre l'utilisation de Highcharts</div></p>
    <p>
<!-- Chargement des variables, et paramètres de Highcharts -->
<script type="text/javascript">
	$(function () {
    var chart;
    $(document).ready(function() {
 
		Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
		    return {
		        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
		        stops: [
		            [0, color],
		            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] 
		        ]
		    };
		});
 
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Statistiques'
            },
            tooltip: {
        	    pointFormat: '<b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: '',
                data: [
                    ['Pour',   <?php echo $num_rows_pour; ?>],
                    ['Contre',       <?php echo $num_rows_contre; ?>],
                    ['Sans opinion',    <?php echo $num_rows_nul; ?>]
                ]
            }]
        });
    });
 
});</script>
<!-- Affichage du graphique -->
<div id="container" style="width:100%; height:400px;"> 
</div></p>
</div>
</body>
</html>
<?php
mysql_free_result($Stats);
?>