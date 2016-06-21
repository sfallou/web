<?php
session_start();
require('secure.php');  
$nbr0  =0; 
$nbr1  =0; 
$nbr2  =0; 
$nbr3  =0; 
$nbr4  =0;
$frais = 0;

$req=$bdd->prepare("SELECT * FROM depense WHERE timestamp>= :times1 AND timestamp<= :times2 ORDER BY id_depense");
$req->execute(array(
                    ':times1' => $timestamp1,
                    ':times2' => $timestamp2

                    ));
while($donnees=$req->fetch())
        {

            $gazoil                 =   $donnees['d_gazoil'];
            $elec                   =   $donnees['d_senelec'];
            $salaire_conducteur     =   $donnees['salaire_conducteur'];
            $salaire_gerant         =   $donnees['salaire_gerant'];
            $salaire_releveur       =   $donnees['salaire_releveur'];
            $entretien              =   $donnees['d_entretien'];
            $d_divers               =   $donnees['d_divers'];
            $salaire                =   $salaire_conducteur+$salaire_gerant+$salaire_releveur;
        }


$total=$gazoil+$elec+$salaire+$entretien+$d_divers;


if($total!=0)
    {
      $nbr0 = ($gazoil*100)/$total;
      $nbr1 = ($elec*100)/$total;
      $nbr2 = ($salaire*100)/$total;
      $nbr3 = ($entretien*100)/$total;
      $nbr4 = ($d_divers*100)/$total;
     
    }


echo "<script type='text/javascript'> 

$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#depense').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Les Depenses effectuees' 
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
                    name: 'Gazoil',
                    y: $nbr0
                }, {
                    name: 'Sénélec',
                    y: $nbr1,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Salaire',
                    y: $nbr2
                }, {
                    name: 'entretien',
                    y: $nbr3
                }, {
                    name: 'Divers',
                    y: $nbr4
                
                }]
            }]
        });
    });
});"
?>

</script>
