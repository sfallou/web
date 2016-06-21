<?php

$nbr0=0; 
$nbr1=0; 
$nbr2=0; 
$nbr3=0;

$req=$bdd->prepare("SELECT * FROM recette WHERE timestamp>= :times1 AND timestamp<= :times2 ORDER BY id_recette");
$req->execute(array(
                    ':times1' => $timestamp1,
                    ':times2' => $timestamp2

                    ));
while($donnees=$req->fetch())
        {
                    
            $abreuvoir  =   $donnees['r_abreuvoir'];
            $potence    =   $donnees['r_potence'];
            $divers     =   $donnees['divers'];
        }    

$total=$abreuvoir+$potence+$divers+$note;

if($total!=0)
    {
      $nbr0 = ($abreuvoir * 100)/$total;
      $nbr1 = ($potence   * 100)/$total;
      $nbr2 = ($divers    * 100)/$total;     
    }


echo "<script type='text/javascript'> 

$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#recette').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Les Recettes effectuees' 
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'abreuvoir',
                    y: $nbr0
                }, {
                    name: 'Potence',
                    y: $nbr1,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Divers',
                    y: $nbr2
              
                
                }]
            }]
        });
    });
});"
?>

</script>
