<?php
$bdd = new PDO('mysql:host=localhost;dbname=challenge2016', 'root', 'passer');
        
            $nom_equipe = "ECL Foot H";
            $sql=$bdd->prepare("SELECT * FROM Matchs WHERE equipe1=?  ORDER BY id_match ");
            $sql->execute(array($nom_equipe));
            $matchs_ecole=$sql->fetchALL();
print_r($matchs_ecole);
?>