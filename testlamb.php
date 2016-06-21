<?php

//recupération du message envoyé par l'utilisateur
$t=$_GET['t'];
$a=$_GET['a'];
$q=$_GET['q'];

//décomposition du message en deux parties : mot-clé et surnom du lutteur
$formatage=explode(" ",$a);
$motclef=$formatage[0];
$lutteur=$formatage[1];

//Mettez le nom du serveur ou le numero  
$dbhost = "localhost";
//Mettez le nom d'utilisateur pour l'accès à la base de données
$dbuser = "root";
//Mettez le mot de passe pour l'accès à la base de données
$dbpass = "passer";
//Mettez le nom de la base de données
$dbname = "TESTLAMB";

//Connexion
mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname) or die(mysql_error());

//Verification
if($t&$q){
    
    //si l'utilisateur envoie le bon mot-clé
    if($motcle=="lamb"){
        $requete="select * from lutteur where surnom=",$lutteur," ";
        $connection=mysql_query($requete) or die(mysql_error());
        $resultat=mysql_fetch_array($connection);
        extract($resultat);
        
        //S'il y a un resultat
        if($resultat){
        echo " $prenom $nom alias $surnom. Il est de l'ecurie $ecurie. Il a $age ans. Il mesure $taille m et pese  $poids kg.";
        }
        //s'il n'y a pas de resultats
        else{
        echo "Ce lutteur n'est pas dans notre base de donnees";
    }
    
    //si l'utilisateur n'envoie pas le bon mot-clé
    else{
            echo "veuillez donner le bon mot-clé !!!";
    }        
}

else{
    echo = "Connexion impossible!";
}
?> 
