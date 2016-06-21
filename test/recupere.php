<?php
//$date_saisi=$_POST['date_saisi'];
//$date_saisi=changedate($date_saisi);
$date_saisi="2014-10-09";
$monfichier = file("/var/log/asterisk/cdr-csv/Master.csv");
$l=count($monfichier);
//echo $l;
echo"<table border='1'>";
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
//if($date==$date_saisi)
	echo "<tr><td>$datte</td><td>$caller</td><td>$answer </td><td>$context</td></tr>";
}
echo "</table>";
?>
