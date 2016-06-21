<?php
/* affichage du tableau reprenant les dates d'activités
*/
// début calendrier
$date=date('D/d/m/Y');
list($dcourt,$day, $month, $year) = explode("/", $date);

$joursem = array('dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam');
$mois=array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
$numsem= array(0, 1, 2, 3, 4,5,6);
// calcul du timestamp
$timestamp = mktime (0, 0, 0, $month, 01, $year);

//echo $joursem[date("w",$timestamp)];

// permet d'afficher éventuellement le nom du premier jour du mois

$num= $numsem[date("w",$timestamp)];

// nombre de jours du mois
$nombreDeJours = intval(date("t",$month));
//echo $nombreDeJours;
//require('includes/start.php');
$i=1;
$j=0;
$month_t=intval(date("n"));
// affichage du mois par son nom
for($k=0;$k<5;$k++)
{
echo "<p><strong> ".$mois[$month_t+$k]."   $year</strong></p>";
// début d'entrée des dates.
?>
<table border="1" width="100%">
<tr>
<?php
// affichage de la première ligne
switch($num){
case 0:
// premier jour est un Dimanche
?>

<td width="12,5%">Dim</td>
<td width="12,5%">Lun</td>
<td width="12,5%">Mar</td>
<td width="12,5%">Mer</td>
<td width="12,5%">Jeu</td>
<td width="12,5%">Ven</td>
<td width="12,5%">Sam</td>
</tr>
<?php
break;

case 1:

// premier jour est un lundi
?>
<td width="12,5%">Lun</td>
<td width="12,5%">Mar</td>
<td width="12,5%">Mer</td>
<td width="12,5%">Jeu</td>
<td width="12,5%">Ven</td>
<td width="12,5%">Sam</td>
<td width="12,5%">Dim</td>
</tr>

<?php
break;

case 2:
// premier jour est un mardi
?>

<td width="12,5%">Mar</td>
<td width="12,5%">Mer</td>
<td width="12,5%">Jeu</td>
<td width="12,5%">Ven</td>
<td width="12,5%">Sam</td>
<td width="12,5%">Dim</td>
<td width="12,5%">Lun</td>
</tr>
<?php
break;
case 3:
// premier jour est un mercredi
?>

<td width="12,5%">Mer</td>
<td width="12,5%">Jeu</td>
<td width="12,5%">Ven</td>
<td width="12,5%">Sam</td>
<td width="12,5%">Dim</td>
<td width="12,5%">Lun</td>
<td width="12,5%">Mar</td>
</tr>
<?php
break;
case 4:
// premier jour est un jeudi
?>
<td width="12,5%">Jeu</td>
<td width="12,5%">Ven</td>
<td width="12,5%">Sam</td>
<td width="12,5%">Dim</td>
<td width="12,5%">Lun</td>
<td width="12,5%">Mar</td>
<td width="12,5%">Mer</td>
</tr>
<?php
break;
case 5:
// premier jour est un Vendredi
?>
<td width="12,5%">Ven</td>
<td width="12,5%">Sam</td>
<td width="12,5%">Dim</td>
<td width="12,5%">Lun</td>
<td width="12,5%">Mar</td>
<td width="12,5%">Mer</td>
<td width="12,5%">Jeu</td>
</tr>
<?php
break;
case 6:
// premier jour est un Samedi
?>

<td width="12,5%">Sam</td>
<td width="12,5%">Dim</td>

<td width="12,5%">Lun</td>
<td width="12,5%">Mar</td>
<td width="12,5%">Mer</td>
<td width="12,5%">Jeu</td>
<td width="12,5%">Ven</td>
</tr>
<?php
break;
}
// fin d'affichage de la premier ligne

while ($i<=$nombreDeJours)
{
$l=$year."-".$month."-".$i;
$requete="select date from activite where date_init <= '$l' and date_fin >= '$l'";
//and date_fin>=date_fin
$valeur=mysql_query($requete);
$ligne=mysql_num_rows($valeur);
echo "<td width=\"12,5%\">";
if ($ligne<>0)
{
$date_act=$i."/".$month."/".$year;
echo "<a href=\"jour.php?date=".$date_act."\">$i</a>";
}else
{
echo $i;
}
echo "</td>";
$i=$i+1;
$j=$j+1;
if ($j==7)
{
echo "</tr><tr>";
$j=0;
}
}
}
?>
</tr>
</table> 

