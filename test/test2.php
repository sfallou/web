<?php 
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$m=date("i");
$date=$d.$m.$y.$h.$i;
function changedate($date) //$date contient 2014-01-25 12:25:15
{
$array = explode(' ',$date); //on separe 2014-01-25 et 12:25:15
$array2 = explode('-',$array[0]);//on separe 2014 et 01 et 25
$newdate= $array2[2].'-'.$array2[1].'-'.$array2[0].' a '.$array[1];
return $newdate;
}
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
//on le marque comme réservé dans la bdd
$requ=mysql_query("update agenda set etat=1 where rv='$rv'");
}
$rv=changedate($rv);

//creationdu fichier audio
$audio="espeak -v fr+f2 -s 135 \"on vous a reservé un Rendez vous pour le $rv\" -w /son/son$num.wav";
exec($audio);
$son="sox /son/son$num.wav -r 8000 -c 1 -g /son/son$num.gsm";
exec($son);
$rm = "rm /son/son$num.wav";
exec($rm);
echo $rv;

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
