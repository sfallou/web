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
@mysql_select_db('planning') or die("Echec de s�lection de la base."); 
$requete = "SELECT rv from agenda WHERE id_proprietaire='$choix' AND etat=0 ORDER BY rv DESC LIMIT 0, 1"; 
$result = mysql_query($requete); 
while($don=mysql_fetch_array($result))
{
//on recupere le rv disponible 
$rv = $don['rv']; 
//on le marque comme r�serv� dans la bdd et on enregistre son num�ro
$requ=mysql_query("update agenda set etat=1, telephone='$num' where rv='$rv'");
}

list($date, $time) = explode(" ", $rv);
list($year, $month, $day) = explode("-", $date);
list($hour, $min, $sec) = explode(":", $time);

$months = array("janvier", "fevrier", "mars", "avril", "mai", "juin",
    "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
$rv = "le $day ".$months[$month-1]." $year a ${hour} heures ${min} minutes";



//creationdu fichier audio

$audio="espeak -v fr+f2 -s 135 \" Votre  Rendez vous est pour le $rv\" -w /son/son$num.wav";
exec($audio);
$son="sox /son/son$num.wav -r 8000 -c 1 -g /son/son$num.gsm";
exec($son);
$mv = "mv /son/son$num.wav /son/son$num$dates.wav";
exec($mv);
echo $rv;
/*

//$export="export LIA_PHON_REP=/usr/local/bin/lia_phon";
//exec($export);
//$cmd1="cd /usr/local/bin/lia_phon && make all && make ressource && make check && find . -print -exec chown root:root '{}' \;";
//exec($cmd1);
//$cmd2="cd /usr/local/bin/lia_phon/doc && \$LIA_PHON_REP/script/lia_text2mbrola < test.txt > test.ola";
//exec($cmd2);
//$cmd3="cd /usr/local/bin/mbrola && ./mbrola -I \$LIA_PHON_REP/data/initfile.lia fr1/fr1 \$LIA_PHON_REP/doc/test.ola test.wav";
//exec($cmd3);
$cmd4="cd /usr/local/bin/mbrola && echo \" on vous a donner un rendez vous pour le $rv\" > rv_audio$num.txt";
exec($cmd4);
$cmd5="cd /usr/local/bin/mbrola && iconv --from-code=UTF-8 --to-code=ISO-8859-1 rv_audio$num.txt > rv_audio_conv$num.txt ";
exec($cmd5);
$cmd6="cd /usr/local/bin/mbrola && \$LIA_PHON_REP/script/lia_nett < rv_audio_conv$num.txt | \$LIA_PHON_REP/script/lia_taggreac | \$LIA_PHON_REP/script/lia_phon | \$LIA_PHON_REP/bin/lia_add_proso > rv_audio_conv$num.pho";
exec($cmd6);
$cmd7="cd /usr/local/bin/mbrola && ./mbrola -I \$LIA_PHON_REP/data/initfile.lia fr1/fr1 rv_audio_conv$num.pho rv_audio_conv$num.wav";
exec($cmd7);
//$cmd8="mv /usr/local/bin/mbrola/rv_audio_conv$num.wav /home/stage/rv_audio_conv$num.wav";
//exec($cmd8);

//$son="sox /home/stage/rv_audio_conv$num.wav -r 8000 -c 1 -g /home/stage/rv_audio_conv$num.gsm";
//exec($son);
//$mv = "mv /home/stage/rv_audio_conv$num.wav /home/stage/rv_audio$num$date.wav";
//exec($mv);
echo $rv;

/* 
// Le Num�ro �tant diff�rant du num�ro associ�a ce code dans la base de donn�e 
else  $test = "espeak �v fr+f2 �s 135 \"vous n'�tes pas autoris� �utiliser ce num�ro\" �w /son/son$num.wav"; 
} 
// le code n'existant pas dans la base de donn�e 
else { 
$test = "espeak �v fr+f5 �s 135 \"le code n'existe pas\" �w /son/son$num.wav"; 
$montant = 0; 
} 
// cr�ation du fichier son 
exec($test); 
$son = "sox /son/son$num.wav �r 8000 �c1 �g /son/son$num.gsm"; 
exec($son); 
$rm = "rm /son/son$num.wav"; 
exec($rm); 
*/
//$rv=changedate($rv);
//echo $rv; 
?>