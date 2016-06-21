
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
<html>
<head>
<title>Falaf.net - Highcharts Exemple 1</title>
<!-- Chargement des librairies: Jquery & highcharts -->
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type="text/javascript" src="js/highcharts.js" ></script>
</head>
 
<body>
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
                    ['Pour',   7],
                    ['Contre',       2],
                    ['Sans opinion',    1]
                ]
            }]
        });
    });
 
});</script>
<!-- Affichage du graphique -->
<div id="container" style="width:100%; height:400px;"> 
</div></p>
</body>
</html>