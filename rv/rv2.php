<?php
//récupération des variables envoyée via CURL 
$choix=$_POST['choix'];
$num=$_POST['num'];

//connexion à la BDD et choix de la table
$serveur="127.0.0.1";
$login="root";
$pass="passer"
$db="planning"
$conx=mysql_connect($serveur,$login,$pass) or die("Echec de connexion");
$sel=mysql_select_db($db) or die("Echec de selection de la base");

//requete sql pour récupérer le premier rv disponible
$requete="SELECT rv FROM agenda WHERE id_proprietaire=$choix AND etat=0 ORDER BY id DESC LIMIT 1";
$result=mysql_query($requete);
//si le rv est disponible on le récupere
while($donnees=mysql_fetch_array($result))
{
	$rv=$donnees['rv'];
//on change l'etat du rv pour indiquer que c'est deja réservé
	$requete=mysql_query("update agenda set etat=1 where rv=$rv");

}
echo $rv;



/*
//on créé le fichier son qui va informé l'appelant	
	$son="espeak -v fr+f2 -s 135 \"Votre Rendez vous est enregistré pour le $rv\" -w /son/son_rv$num.wav";
}
else 
{
//on lui dit ceci
$son="espeak -v fr+f2 -s 135 \"il n'y a pas de rendez vous disponible.Veuillez ressayer ultérieurement\" -w /son/son_rv$num.wav";	
			$rv=32;	
}
exec($son);
$son1="sox /son/son_rv$num.wav -r 8000 -cl -g /son/son_rv$num.gsm";
exec($son1);
echo $rv;*/
?>
