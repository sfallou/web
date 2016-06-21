<?php

require("head.php");
$req = "select * from dic_citoyen ";
$reponse = $bdd->prepare($req);
$reponse->execute();
$rep=$reponse->fetchAll();
$n=count($rep);
$reponse->closeCursor();
?>


<div align="center">
<!-- Affichage du nombre de votes par Etat-->
<p><?php 
$req2 = "select * from dic_citoyen where cty_sexe='masculin' ";
$reponse2 = $bdd->prepare($req2);
$reponse2->execute();
$rep2=$reponse2->fetchAll();
$nombreHomme=count($rep2);
$reponse2->closeCursor();
$nombreFemme=$n-$nombreHomme;
echo "Nombre de citoyens masculins=$nombreHomme<br/>";
echo "Nombre de citoyens feminins=$nombreFemme<br/>";
?></p>
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
                text: 'Statistiques Sexe'
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
                    ['Hommes',   <?php echo $nombreHomme; ?>],
                    ['Femmes',       <?php echo $nombreFemme; ?>],
                ]
            }]
        });
    });
 
});</script>
<!-- Affichage du graphique -->
<div id="container" style="width:100%; height:400px;"> 
</div></p>
</div>

<?php

?>