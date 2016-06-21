<?Php
session_start();
require('secure.php');
//Les requetes pour les stats
$nbr0=0;$nbr1=0;$nbr2=0;$nbr3=0;$nbr4=0;$nbr5=0;$nbr6=0;$nbr7=0;$nbr8=0;
//deifiniton d'un nouveau objet
$village= new Statistique();


$nbr0=$village->abonneVillage($bdd,"seokhaye");
$nbr1=$village->abonneVillage($bdd,"sine");
$nbr2=$village->abonneVillage($bdd,"keur_ibra");
$nbr3=$village->abonneVillage($bdd,"kanene");
$nbr4=$village->abonneVillage($bdd,"daraja");
$nbr5=$village->abonneVillage($bdd,"keur_malamine");
$nbr6=$village->abonneVillage($bdd,"keur_mory");
$nbr7=$village->abonneVillage($bdd,"khourwa");
$nbr8=$village->abonneVillage($bdd,"village_special");

$total=$nbr8+$nbr7+$nbr6+$nbr5+$nbr4+$nbr3+$nbr2+$nbr1+$nbr0;

if($total!=0)
    {
      $nbr0=($nbr0*100)/$total;
      $nbr1=($nbr1*100)/$total;
      $nbr2=($nbr2*100)/$total;
      $nbr3=($nbr3*100)/$total;
      $nbr4=($nbr4*100)/$total;
      $nbr5=($nbr5*100)/$total;
      $nbr6=($nbr6*100)/$total;
      $nbr7=($nbr7*100)/$total;
      $nbr8=($nbr8*100)/$total;  
    }

echo "<script type='text/javascript'> 

$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#abonne').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Nombre d habitant par village' 
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
                    name: 'seokhaye',
                    y: $nbr0
                }, {
                    name: 'sine',
                    y: $nbr1,
                    sliced: true,
                    selected: true
                }, {
                    name: 'keur_ibra',
                    y: $nbr2
                }, {
                    name: 'kanene',
                    y: $nbr3
                }, {
                    name: 'daraja',
                    y: $nbr4
                }, {
                    name: 'keur_malamine',
                    y: $nbr5
                }, {
                    name: 'keur_mory',
                    y:$nbr6    
                 },{
                    name: 'khourwa',
                    y: $nbr7
                },{
                    name: 'village_special',
                    y: $nbr8

                }]
            }]
        });
    });
});"
?>

</script>
