<html>
<body>
<?php
$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("mp3", "jpg", "gif","jpeg","mp4","flv","mpeg","mkv","webm","ogg","ma4");
if (!(in_array($extensionFichier, $extensionsAutorisees))) {
    echo "Le fichier n'a pas l'extension attendue";
} else {    
    // Copie dans le repertoire du script avec un nom
    // incluant l'heure a la seconde pres 
    $repertoireDestination = dirname(__FILE__)."/";
    $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],$repertoireDestination.$nomDestination)) {
        
		if($extensionFichier=="mp3"  or $extensionFichier=="ma4" or $extensionFichier=="wav" or $extensionFichier=="ogg"){
			?>
			<h1>Entre ce nom <?php echo$nomDestination;?> dans le premier champs de ce formulaire 
			<a href="http://localhost/projtOuya/sontoson.php">pour la Conversion  audio en audio </a></h1>
			<?php
			}
		if($extensionFichier=="mp4" or $extensionFichier=="flv" or $extensionFichier=="avi" or $extensionFichier=="wmv" or $extensionFichier=="mkv"){
			?>
			<h1>Entre ce nom <?php echo$nomDestination;?> dans le premier champs de l'un de ces formulaires</h1>
			<a href="http://localhost/projtOuya/videotoson.php">Pour la Conversion video en audio</a><br/>
			<a href="http://localhost/projtOuya/videotovideo.php">Conversion video en video</a>
			<?php
			}
			
    } 
    else {
        echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                "le format n'est pas autorisée";
    }
}
?>
</body>
</html>
