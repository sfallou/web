<?php 
$code=$_POST['code']; 
$num=$_POST['num']; 
$numm=1; 
@mysql_connect('localhost','root','passer') or die("Echec de connexion"); 
@mysql_select_db('sva') or die("Echec de s�lection de la base."); 
$requete = "select * from banq where code='$code'"; 
$result = mysql_query($requete); 
while($don=mysql_fetch_array($result))
{ 
$montant = $don['montant']; 
}
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
echo $montant; 
?>
