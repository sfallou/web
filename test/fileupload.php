<html>
<body>
<?php
$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("jpeg", "jpg", "gif");
if (!(in_array($extensionFichier, $extensionsAutorisees))) {
    echo "Le fichier n'a pas l'extension attendue";
} else {    
    // Copie dans le repertoire du script avec un nom
    // incluant l'heure a la seconde pres 
    $repertoireDestination = dirname(__FILE__)."/";
    $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], 
                                     $repertoireDestination.$nomDestination)) {
        echo "Le fichier temporaire ".$_FILES["monfichier"]["tmp_name"].
                " a �t� d�plac� vers ".$repertoireDestination.$nomDestination;
    } else {
        echo "Le fichier n'a pas �t� upload� (trop gros ?) ou ".
                "Le d�placement du fichier temporaire a �chou�".
                " v�rifiez l'existence du r�pertoire ".$repertoireDestination;
    }
}
?>
</body>
</html>