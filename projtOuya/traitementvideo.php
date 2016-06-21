<?php
require("head.php");
?>
	<body>
		
<?php
$nomOrigine = $_FILES['input']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("avi","mp4","flv","mpeg","mkv","webm","ogg","wmv");
if (!(in_array($extensionFichier, $extensionsAutorisees))) 
{
    echo "Le fichier n'a pas l'extension attendue";
}
else 
{    
    // Copie dans le repertoire du script avec un nom
    // incluant l'heure a la seconde pres 
    $repertoireDestination = dirname(__FILE__)."/upload";
    $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

    if (move_uploaded_file($_FILES["input"]["tmp_name"],$repertoireDestination.$nomDestination)) 
    {
		if( isset($_POST["output"]) && isset($_POST["format"]) ){
			$output=$_POST["output"];
			$format=$_POST["format"];
			$cmd1="cd /var/www/html/projtOuya/upload && ffmpeg -i $nomDestination $output.$format ";
			exec($cmd1);
			$cmd2="cd /var/www/html/projtOuya/upload && chmod 777 $output.$format ";
			exec($cmd2);
			$cmd="cd /var/www/html/projtOuya/upload && mv $output.$format /var/www/html/projetOuya/converti/ ";
			exec($cmd);   
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
}
}
?>
</body>
</html>
