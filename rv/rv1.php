<?php
$date=$_GET['date'];
$heure=$_GET['heure'];
$num=$_GET['num'];
$jr=substr($date,0,2);
$mois=substr($date,2,2);
$annee=substr($date,4,2);
$heure=substr($heure,0,2);
$min=substr($heure,2,2);
@mysql_connect('localhost','root','passer') or die("Echec de connexion");
@mysql_select_db('sva') or die("Echec de selection de la base");
$requete="select * from rv where time='$date$heure'";
$result=mysql_query($requete);
$ligne=mysql_fetch_row($result);
$numm=mysql_num_rows($result);
//test de la validité des données reçues
if($jr <=31 && $mois <=12 && $heure <=24 && $min <=60)
	{
//test  du respect de l'intervalle de temps suggéré 
	if($min%20==0)
		{
//test pour voir si l'heure (heure et date) n'a pa été choisi
		if($numm==0)
			{
			$update="insert into rv values('$date$heure')";
			$up=mysql_query($update);
//creation du fichier test suivi du num .call
			$touch="/usr/bin/touch /son/test$num.call";
			$exec($touch);
			$text="echo \"Channel: SIP/sfallou\nMaxRetries: 0\nRetryTime: 60\nWaitTime: 31\nContext: emc2\nExtension: $num\nPriority: 1\" >> /son/test$num.call";
			exec($text);
//création du fichier qui va recevoir la commande à executer par at 
			$at="/usr/bin/touch /son/at$num";
			exec($at);
			$text2="echo \"mv /son/test$num.call /var/spool/asterisk/outgoing/\" >> /son/at$num";
			exec($text2);
			$dio="at $heure:$min $moi/$jr/$annee";
			$rv=$dio;
			$son="espeak -v fr+f2 -s 135 \"RV bien pris\" -w /son/son_rv$num.wav";
			}
		else 
			{
			$son="espeak -v fr+f2 -s 135 \"l'heure a été choisie\" -w /son/son_rv$num.wav";	
			$rv=32;	
			}
		}
	else
		{	
		$son="espeak -v fr+f2 -s 135 \"Veuillez respecter l'intervalle de temps\" -w /son/son_rv$num.wav";		
		$rv=33;
		}
	}
else
	{
	$son="espeak -v fr+f2 -s 135 \"Veuillez taper une bonne date\" -w /son/son_rv$num.wav";		
	$rv=34;
	}

exec($son);
$son1="sox /son/son_rv$num.wav -r 8000 -cl -g /son/son_rv$num.gsm";
exec($son1);
$rm="rm /son/son_rv$num.wav";
exec($rm);
echo $rv
?>
