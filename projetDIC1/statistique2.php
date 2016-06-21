<?php
require("head.php");
$req = "select * from dic_citoyen ";
$reponse = $bdd->prepare($req);
$reponse->execute();
$rep=$reponse->fetchAll();
$n=count($rep);
$reponse->closeCursor();

$moins18=0;
$jusqua50=0;
$plus50=0;
$curdate=date("Y-m-d : h:m:s");

?>

<div align="center">
<!-- Affichage du nombre de votes par Etat-->
<p><?php 
$req2 = "select * from dic_citoyen  ";
$reponse2 = $bdd->prepare($req2);
$reponse2->execute();
while ($data=$reponse2->fetch()) {
    $datenaiss=$data['cty_datenaissance'];
    if($curdate-$datenaiss<=18)
        $moins18=$moins18+1;
    if($curdate-$datenaiss>18 && $curdate-$datenaiss<=50)
        $jusqua50=$jusqua50+1;
    if($curdate-$datenaiss>50)
        $plus50=$plus50+1;

}
$reponse2->closeCursor();
echo "Nombre de citoyens enregistres: $n;<br/>";
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
                text: 'Statistiques Age'
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
                    ['Moins 18 ans',   <?php echo $moins18; ?>],
                    ['Entre 18 et 50 ans',       <?php echo $jusqua50; ?>],
                    ['Plus de 50 ans',       <?php echo $plus50; ?>],
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