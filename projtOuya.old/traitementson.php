<?php
require("head.php");
?>
	<body>
		
<?php
$nomOrigine = $_FILES['video']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("avi","mp4","flv","mpeg","mkv","webm","ogg","wmv");
/*if (!(in_array($extensionFichier, $extensionsAutorisees))) 
{
    echo "Le fichier n'a pas l'extension attendue";
}
else 
{*/    
    // Copie dans le repertoire du script avec un nom
    // incluant l'heure a la seconde pres 
    $repertoireDestination = "upload/";
    $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

    if (move_uploaded_file($_FILES["video"]["tmp_name"],$repertoireDestination.$nomDestination)) 
    {
		$son=$_POST["son"];
		$form=$_POST["form"];
		$cmd3="cd /var/www/html/projtOuya/upload && ffmpeg -i $video -vn -f $nomDestination $son.$form ";
		exec($cmd3);
		$cmd4="cd /var/www/html/projtOuya/upload && chmod 777 $son.$form ";
		exec($cmd4);
		$cmd5="cd /var/www/html/projtOuya/upload && mv $son.$form /var/www/html/projetOuya/converti/ ";
		exec($cmd5);
		?>
	<center><h1>Conversion terminée!</h1>
	<a href="conversion.php">Cliquer ici pour récuréper la vidéo convertie</a><br/>
	<a href="videotovideo.php">Cliquer ici pour convertir une autre vidéo</a><br/>
	<a href="index.php">Retourner dans le site</a><br/>
	<center>  
    <?php
    } 
    
    else 
    {
        echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                "le format n'est pas autorisée";
    }
//}
?>
</body>
</html>
