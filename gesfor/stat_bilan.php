<?Php
session_start();
require('secure.php');  
//Les requetes pour les stats
$recette_total=0;
$depense_total=0;
$facture_totale=0;

$finance =new Finance($bdd);  
$facture_totale=$finance->consommationTotal($bdd)['facture_total'];
$depense_total=Finance::etatFinance($bdd)['depense'];
$recette_total=Finance::etatFinance($bdd)['recette'];



$total=$depense_total+$recette_total+$facture_totale;

if($total!=0)
    {
      $depense_total=($depense_total*100)/$total;
      $recette_total=($recette_total*100)/$total;
      $facture_totale=($facture_totale*100)/$total;
    }
?>    

<script type="text/javascript"> 
$(function () {
    $('#bilan').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Bilan depuis le debut'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                ''
                               
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'valeurs(%)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}:' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'recette_totale',
            data: [<?php echo $recette_total ;?>]

        }, {
            name: 'depense_totale',
            data:[<?php echo $depense_total ;?>]
         }, {
            name: 'facture_totale',
            data:[<?php echo $facture_totale ;?>]    

        }]
    });
});

</script>
	
	
