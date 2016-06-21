<?php
ini_set("display_errors",0);error_reporting(0);
require("head.php");
?>
<?php
function changedate($date)//$date contient 31/12/2010 
{
 $array2 = explode ('/', $date); //on separe 12 et 31 et 2010 dans un new array
 $newdate = $array2[2].'-'.$array2[1].'-'.$array2[0];
 return $newdate; //$newdate contient 2010-12-31
}
?> 
<body>
<?php
	include("haut.php");
	require("menu_admin.php"); 
?>
<?php
// La date n’a pas été envoyée
if (empty($_POST["date_saisi"]))
{
?>
<div class="text" style="width:400px; margin-left:350px;">
		Consulter l'historique des appels
</div> 
<form class="formulaire" method="POST" action="statistique.php" style="margin-left:400px; width:300px;">
	<p class="clearfix">
	<table>
	<tr><td><label for="date_saisi">Date</label></td><td><input type="texte" name="date_saisi" placeholder="10/01/2014"/></td></tr>
	<tr><td></td><td></td></tr> <tr><td></td><td></td></tr> <tr><td></td><td></td></tr> <tr><td></td><td></td></tr> <tr><td></td><td></td></tr> 
	<tr><td rowspan="5"></td></tr>
	<tr><td><input type="submit" name="submit" value="Valider" ></td><td><input type="reset" name="reset" value="Reset" ></td></tr>
	</table>
	</p>
</form>

	<?php
}
// La date a été envoyée 
else
{
?>
<h3 class="titre">Historique des appels</h3>
<table  cellpadding="0" cellspacing="0" border="1" style=" width:700px; margin-top:50px; margin-left:150px;" class="titre">
	<tr><th>Date et heure</th><th>Appelant</th><th>Appelé</th><th>Conext</th></tr>
<?php
$date_saisi=$_POST['date_saisi'];
$date_saisi=changedate($date_saisi);
$date_saisi="$date_saisi";
$monfichier = file("/var/log/asterisk/cdr-csv/Master.csv");
$l=count($monfichier);
//echo $l;
for($i=0;$i<=$l;$i++)
{
	$line=$monfichier[$i];
	list($rien,$num_appelant,$num_appele,$context,$b,$c,$d,$e,$f,$g,$h,$dat)=explode(",",$line);
	if($dat)
	{
	list($r,$caller,$c)=explode("\"",$num_appelant);
	list($r,$answer,$c)=explode("\"",$num_appele);
	list($r,$context,$c)=explode("\"",$context);
	list($r,$datte,$c)=explode("\"",$dat);
	list($date,$heure)=explode(" ",$datte);
	$date="$date";
}
if($answer!="t" AND $date==$date_saisi)
	echo "<tr><td>$datte</td><td>$caller</td><td>$answer </td><td>$context</td></tr>";
}
echo "</table>";
}
?>
</body>
</html>
