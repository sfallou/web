<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$m=date("i");
$dates=$d.$m.$y.$h.$i;

//on recupere les variables

$choix=$_GET['choix']; 
$num=$_GET['num']; 
//$numm=1; 
@mysql_connect('localhost','root','passer') or die("Echec de connexion"); 
@mysql_select_db('planning') or die("Echec de sélection de la base."); 
$requete = "SELECT rv from agenda WHERE id_proprietaire='$choix' AND etat=0 ORDER BY rv DESC LIMIT 0, 1"; 
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
//on  marque la date comme réservée dans la bdd et on enregistre son numéro et le code aléatoire
$requ=mysql_query("update agenda set etat=1, telephone='$num', code='$code_aleatoire' where rv='$rv'");
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
    $mois=$months[$month-1];
    $minute="${min}";
$rv = "le $day ".$months[$month-1]." $year a $heure heures ${min} minutes";

//creationdu fichier audio pour le jour du rv

$audio_day="espeak -v fr+f2 -s 135 \"$day\" -w /son/son_jour$num.wav";
exec($audio_day);
$son_day="sox /son/son_jour$num.wav -r 8000 -c 1 -g /son/son_jour$num.gsm";
exec($son_day);
$rm1 = "rm /son/son_jour$num.wav";
exec($rm1);

//creation du fichier audio pour le mois du rv

$audio_mois="espeak -v fr+f2 -s 135 \"$mois\" -w /son/son_mois$num.wav";
exec($audio_mois);
$son_mois="sox /son/son_mois$num.wav -r 8000 -c 1 -g /son/son_mois$num.gsm";
exec($son_mois);
$rm2 = "rm /son/son_mois$num.wav";
exec($rm2);

//creationdu fichier audio pour l'année du rv

$audio_an="espeak -v fr+f2 -s 135 \"$year\" -w /son/son_year$num.wav";
exec($audio_an);
$son_an="sox /son/son_year$num.wav -r 8000 -c 1 -g /son/son_year$num.gsm";
exec($son_an);
$rm3 = "rm /son/son_year$num.wav";
exec($rm3);

//creation du fichier audio pour l'heure du rv

$audio_heure="espeak -v fr+f2 -s 135 \"$heure\" -w /son/son_heure$num.wav";
exec($audio_heure);
$son_heure="sox /son/son_heure$num.wav -r 8000 -c 1 -g /son/son_heure$num.gsm";
exec($son_heure);
$rm4 = "rm /son/son_heure$num.wav";
exec($rm4);

//creation du fichier audio pour les minutes du rv

$audio_minute="espeak -v fr+f2 -s 135 \"$minute\" -w /son/son_minute$num.wav";
exec($audio_minute);
$son_minute="sox /son/son_minute$num.wav -r 8000 -c 1 -g /son/son_minute$num.gsm";
exec($son_minute);
$rm5 = "rm /son/son_minute$num.wav";
exec($rm5);

//creation du fichier audio pour le code du rv
$son_code0=$code_aleatoire[0];
$son_code1=$code_aleatoire[1];
$son_code2=$code_aleatoire[2];
$son_code3=$code_aleatoire[3];
$son_code4=$code_aleatoire[4];
$son_code5=$code_aleatoire[5];
$son_code6=$code_aleatoire[6];
$son_code7=$code_aleatoire[7];

$code_audio0="espeak -v fr+f2 -s 135 \"$son_code0\" -w /son/code_0$num.wav";
exec($code_audio0);
$soncode0="sox /son/code_0$num.wav -r 8000 -c 1 -g /son/code_0$num.gsm";
exec($soncode0);
$rm_code0 = "rm /son/code_0$num.wav";
exec($rm_code0);

$code_audio1="espeak -v fr+f2 -s 135 \"$son_code1\" -w /son/code_1$num.wav";
exec($code_audio1);
$soncode1="sox /son/code_1$num.wav -r 8000 -c 1 -g /son/code_1$num.gsm";
exec($soncode1);
$rm_code1 = "rm /son/code_1$num.wav";
exec($rm_code1);

$code_audio2="espeak -v fr+f2 -s 135 \"$son_code2\" -w /son/code_2$num.wav";
exec($code_audio2);
$soncode2="sox /son/code_2$num.wav -r 8000 -c 1 -g /son/code_2$num.gsm";
exec($soncode2);
$rm_code2 = "rm /son/code_2$num.wav";
exec($rm_code2);

$code_audio3="espeak -v fr+f2 -s 135 \"$son_code3\" -w /son/code_3$num.wav";
exec($code_audio3);
$soncode3="sox /son/code_3$num.wav -r 8000 -c 1 -g /son/code_3$num.gsm";
exec($soncode3);
$rm_code3 = "rm /son/code_3$num.wav";
exec($rm_code3);

$code_audio4="espeak -v fr+f2 -s 135 \"$son_code4\" -w /son/code_4$num.wav";
exec($code_audio4);
$soncode4="sox /son/code_4$num.wav -r 8000 -c 1 -g /son/code_4$num.gsm";
exec($soncode4);
$rm_code4 = "rm /son/code_4$num.wav";
exec($rm_code4);

$code_audio5="espeak -v fr+f2 -s 135 \"$son_code5\" -w /son/code_5$num.wav";
exec($code_audio5);
$soncode5="sox /son/code_5$num.wav -r 8000 -c 1 -g /son/code_5$num.gsm";
exec($soncode5);
$rm_code5 = "rm /son/code_5$num.wav";
exec($rm_code5);

$code_audio6="espeak -v fr+f2 -s 135 \"$son_code6\" -w /son/code_6$num.wav";
exec($code_audio6);
$soncode6="sox /son/code_6$num.wav -r 8000 -c 1 -g /son/code_6$num.gsm";
exec($soncode6);
$rm_code6 = "rm /son/code_6$num.wav";
exec($rm_code6);


$code_audio7="espeak -v fr+f2 -s 135 \"$son_code7\" -w /son/code_7$num.wav";
exec($code_audio7);
$soncode7="sox /son/code_7$num.wav -r 8000 -c 1 -g /son/code_7$num.gsm";
exec($soncode7);
$rm_code7 = "rm /son/code_7$num.wav";
exec($rm_code7);

//on affiche le RV et le code dans le console asteisk
echo "$rv  ";
echo "et code=$code_aleatoire";

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
