<?php
@mysql_connect('localhost','root','passer') or die("Echec de connexion"); 
@mysql_select_db('planning') or die("Echec de sélection de la base."); 
$requete = "SELECT rv from agenda WHERE id_proprietaire=1 AND etat=0 ORDER BY rv DESC LIMIT 0, 1"; 
$result = mysql_query($requete); 
while($don=mysql_fetch_array($result))
{
//on recupere le rv disponible 
$rv = $don['rv']; 
//on génére un code de 6 chiffre
$characts   = '1234567890'; 
	$code_aleatoire      = 'EM'; 

	for($i=0;$i < 6;$i++)    //6 est le nombre de caractères
	{ 
        $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
	}
	
}

list($date, $time) = explode(" ", $rv);
list($year, $month, $day) = explode("-", $date);
list($hour, $min, $sec) = explode(":", $time);
$day="$day";
$char1 =$day[0];
$char2 = $day[1];
if($char1=="0") 
{
	if($char2==1)
	{
		$day="premier";
	}
	else
	{
		$day = substr($day,1);
	}
}
$heure="${hour}";
$h1 =$heure[0];
$h2 = $heure[1];
if($h1=="0") 
{
	$heure = substr($heure,1);	
}
$months = array("janvier", "fevrier", "mars", "avril", "mai", "juin",
    "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
$rv = "le $day ".$months[$month-1]." $year a $heure heures ${min} minutes";

echo $rv;
echo " <br/>code=$code_aleatoire";

/*
$cmd4="cd /usr/local/bin/mbrola && echo \"  $rv\" > rv_audio$num.txt";
exec($cmd4);

$rep="/usr/local/bin/lia_phon";

$cmd6="cd /usr/local/bin/mbrola && $rep/script/lia_nett < rv_audio$num.txt | $rep/script/lia_taggreac | $rep/script/lia_phon | $rep/bin/lia_add_proso > rv_audio$num.pho";
exec($cmd6);
$cmd7="cd /usr/local/bin/mbrola && ./mbrola -I $rep/data/initfile.lia fr1/fr1 rv_audio$num.pho rv_audio$num.wav";
exec($cmd7);
$cmd8="mv /usr/local/bin/mbrola/rv_audio$num.wav /son/rv_audio$num.wav";
exec($cmd8);

$son="sox /son/rv_audio$num.wav -r 8000 -c 1 -g /son/rv_audio$num.gsm";
exec($son);
$mv = "mv /son/rv_audio_conv$num.wav /son/rv_audio$num$date.wav";
exec($mv);
echo $rv;
echo"<br/><br/>";
echo $code_aleatoire;
*/
/* 
// Le Numéro étant différant du numéro associéa ce code dans la base de donnée 
else  $test = "espeak ­v fr+f2 ­s 135 \"vous n'étes pas autorisé àutiliser ce numéro\" ­w /son/son$num.wav"; 
} 
// le code n'existant pas dans la base de donnée 
else { 
$test = "espeak ­v fr+f5 ­s 135 \"le code n'existe pas\" ­w /son/son$num.wav"; 
$montant = 0; 
} 
// création du fichier son 
exec($test); 
$son = "sox /son/son$num.wav ­r 8000 ­c1 ­g /son/son$num.gsm"; 
exec($son); 
$rm = "rm /son/son$num.wav"; 
exec($rm); 
*/
//$rv=changedate($rv);
//echo $rv; 
?>
